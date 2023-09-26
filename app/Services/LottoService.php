<?php

namespace App\Services;

use App\Jobs\BuyTicket;
use App\Jobs\DrawNotificationJob;
use App\Models\Draw;
use App\Models\DrawTicket;
use App\Models\Jackpot;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LottoService
{
    protected $paydunyaService;

    protected $accountService;

    public function __construct()
    {
        $this->paydunyaService = new PayDunyaService();
        $this->accountService = new AccountService();
    }

    public function draw()
    {
        $tickets = Ticket::where('is_expire', 0)->get();
        if (count($tickets) > 0) {
            $winningNumbers = $this->generateWinningNumbers(); // génération aléatoire des numéros tirés au sorts
            $resultats = $this->drawWinners($winningNumbers, $tickets); // résultats des tirages
            $totalWinner = $resultats['totalWinner'];
            $drawResults = $resultats['drawResults'];
            $initJackpot = $this->jackpot();
            $benefit = $this->benefits($initJackpot, $totalWinner);

            if ($drawResults) {
                DB::beginTransaction();
                try {
                    $drawStore = Draw::create([
                        'winning_numbers' => $winningNumbers,
                        'draw_date' => now(),
                        'jackpot_id' => $initJackpot->id,
                    ]);

                    foreach ($drawResults as $drawResult) {
                        DrawTicket::create([
                            'ticket_id' => $drawResult['ticket']->id,
                            'draw_id' => $drawStore->id,
                            'is_winner' => $drawResult['is_winner'],
                        ]);

                        if ($drawResult['is_winner']) {
                            $account = $drawResult['ticket']->load('user.account')->user->account;
                            $this->accountService->creditAccount(
                                $account,
                                $benefit,
                                'Gagnant du tirage du lotto du : '.$drawStore->draw_date->format('d/m/Y H:i')
                            );
                        }
                        // envoie de la notification
                        $drawResult['ticket']->update(['is_expire' => 1]);
                    }
                    $resetJackpot = $this->resetJackpot($totalWinner, $initJackpot); // réinitialisation du jackpot
                    DB::commit();
                    if ($resetJackpot) {
                        dispatch(new DrawNotificationJob(
                            $drawStore,
                            $resetJackpot,
                            $totalWinner,
                            $benefit)
                        );
                    }

                    return true;
                } catch (\Exception $e) {
                    DB::rollback(); // Annuler la transaction en cas d'erreur
                    Log::error('Rollback in transaction : Tirage et distribution de gain');
                }
            }
        }

        return false; // Aucun ticket valable ou vendu pour
    }

    public function benefits($initJackpot, $totalWinner)
    {
        if ($totalWinner == 1) {
            return $initJackpot->amount;
        }

        if ($totalWinner > 1) {
            return $initJackpot->amount / $totalWinner;
        }

        return 0;
    }

    public function drawWinners($winningNumbers, $tickets)
    {
        // Initialisez un tableau pour stocker les résultats du tirage
        $drawResults = [];
        $totalWinner = 0;

        foreach ($tickets as $ticket) {
            $chosenNumbers = $ticket->numbers;
            $matchingNumbers = array_intersect($winningNumbers, $chosenNumbers);
            $matchingCount = count($matchingNumbers);
            $isWinner = ($matchingCount == 7) ? 1 : 0;
            // Enregistrez les résultats du tirage
            $drawResults[] = [
                'ticket' => $ticket,
                'matching_numbers' => $matchingNumbers,
                'matching_count' => $matchingCount,
                'is_winner' => $isWinner,
            ];

            if ($isWinner) {
                $totalWinner++;
            }
        }

        return [
            'totalWinner' => $totalWinner,
            'drawResults' => $drawResults,
        ];
    }

    public function validPayement(array $data)
    {

        if (! $invoice = $this->paydunyaService->isValidPayement($data)) {
            return false;
        }

        DB::beginTransaction();
        try {
            $ticket = Ticket::create([
                'numbers' => $invoice['numbers'],
                'code' => $invoice['code_ticket'],
                'is_expire' => 0,
                'user_id' => auth()->user()->id,
            ]);
            DB::commit(); // Confirmer la transaction si tout s'est bien passé
            dispatch(new BuyTicket(
                $ticket->load('user'),
                $invoice['invoice_url']
            ));
            return $ticket;
        } catch (\Exception $e) {
            DB::rollback(); // Annuler la transaction en cas d'erreur
            Log::error('Création de ticket : Erreur base de données');

            return false;
        }

    }

    public function processPayement(array $data)
    {
        $data['code_ticket'] = $this->generateCodeTicket();
        $data['product'] = 'Ticket PayDunya Lotto. Code : '.$data['code_ticket'];
        $data['price'] = 500.00;
        $data['quantity'] = 1;
        if (! $invoiceUrl = $this->paydunyaService->processPayement($data)) {
            return false;
        }

        return $invoiceUrl;
    }

    public function isEligibleForPayment()
    {
        $currentDateTime = Carbon::now();
        $dayOfWeek = $currentDateTime->dayOfWeek;
        $hour = $currentDateTime->hour;
        if (($dayOfWeek == Carbon::TUESDAY) && ($hour > 10 && $hour <= 12)) {

            return false;
        }

        if (($dayOfWeek == Carbon::FRIDAY) && ($hour > 10 && $hour <= 12)) {

            return false;
        }

        return true;
    }

    public function isActiveTicket()
    {

        if ($ticket = Ticket::where('user_id', auth()->user()->id)->where('is_expire', 0)->first()) {
            return $ticket;
        }

        return false;
    }

    public function jackpot()
    {
        return Jackpot::whereDoesntHave('draw')->first();
    }

    public function generateWinningNumbers()
    {
        $winningNumbers = [];
        while (count($winningNumbers) < 7) {
            $randomNumber = rand(1, 50);
            if (! in_array($randomNumber, $winningNumbers)) {
                $winningNumbers[] = $randomNumber;
            }
        }

        return $winningNumbers;
    }

    protected function generateCodeTicket()
    {
        $currentDate = Carbon::now();
        $datePart = $currentDate->format('HiYmd');
        $randomPart = Str::random(6);

        return Str::upper('T-'.$datePart.$randomPart);
    }

    public function resetJackpot($totalWinner, $jackpot)
    {
        $initial = 20000000.00;

        if ($totalWinner == 0) {
            $newJackpot = $jackpot->amount + 5000000.00;
        }

        if ($totalWinner > 0) {
            $newJackpot = $initial;
        }

        return Jackpot::create([
            'amount' => $newJackpot,
        ]);
    }
}
