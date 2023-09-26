<?php

namespace App\Services;

use App\Models\Account;
use App\Models\Ticket;
use App\Models\Transaction;

class UserService
{
    public function getListTicketsByUser($userId, $paginate = 10)
    {
        return Ticket::with('drawTicket.draw')
            ->where('user_id', $userId)
            ->when(request()->has('search'), function ($q) {
                $q->where('code', 'like', '%'.request('search').'%');
            })->latest()
            ->paginate($paginate);

    }

    public function getListTransactionsByUser($userId, $paginate = 10)
    {
        return Transaction::with('account.user')
            ->whereHas('account', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->when(request()->has('search'), function ($q) {
                $q->where('amount', 'like', '%'.request('search').'%')
                    ->orWhere('type', 'like', '%'.request('search').'%')
                    ->orWhere('description', 'like', '%'.request('search').'%');
            })
            ->latest()
            ->paginate($paginate);
    }

    public function getAccountUser($userId)
    {
        return Account::where('user_id', $userId)->first();
    }
}
