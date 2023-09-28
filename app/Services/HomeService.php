<?php

namespace App\Services;

use App\Models\Draw;
use App\Models\Ticket;
use Carbon\Carbon;

class HomeService
{
    public function index()
    {

        $dateCurrent = Carbon::now();

        return [
            'draw' => Draw::latest()->first(),
            'tuesday' => $dateCurrent->next(Carbon::TUESDAY)->copy(),
            'friday' => $dateCurrent->next(Carbon::FRIDAY)->copy(),
            'jackpot' => (new LottoService())->jackpot(),
        ];
    }

    public function results(array $data)
    {
        $response = [];
        $response['draws'] = Draw::with('drawTickets')->latest()->paginate(8);

        if (is_array($data) && isset($data['ticket'])) {
            $response['ticket'] = Ticket::where('code', $data['ticket'])->first();
        }

        return $response;
    }
}
