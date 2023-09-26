<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class AccountService
{
    public function creditAccount(Account $account, $amount, $description)
    {
        DB::beginTransaction();
        try {
            $account->amount += $amount;
            $account->save();
            // Enregistrez la transaction
            Transaction::create([
                'account_id' => $account->id,
                'amount' => $amount,
                'description' => $description,
                'type' => 'credit',
            ]);
            DB::commit(); // Confirmer la transaction si tout s'est bien passé
        } catch (\Exception $e) {
            DB::rollback(); // Annuler la transaction en cas d'erreur
        }
    }

    public function withdrawal(array $dataValid, $user)
    {
        $account = $user->load('account')->account;
        $data['amount'] = $dataValid['amount'];
        $data['account_alias'] = $dataValid['account'];
        $paydunyaService = new PayDunyaService();

        if ($withDrawal = $paydunyaService->initWithdrawal($data)) {
            if ($paydunyaService->disturbeSubmit($withDrawal)) {
                if ($this->debiterCompte($account, $data['amount'], "Remboursement")) {
                    return $account;
                }
            }
        }

        return false;
    }

    public function debiterCompte(Account $account, $amount, $description)
    {
        DB::beginTransaction();
        try {
            if ($account->solde >= $amount) {
                $account->solde -= $amount;
                $account->save();
                // Enregistrez la transaction
                Transaction::create([
                    'account_id' => $account->id,
                    'amount' => $amount,
                    'description' => $description,
                    'type' => 'debit',
                ]);

                return $account;
            }
            DB::commit(); // Confirmer la transaction si tout s'est bien passé
        } catch (\Exception $e) {
            DB::rollback(); // Annuler la transaction en cas d'erreur
            return false;
        }
    }
}
