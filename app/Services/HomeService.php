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
        ];
    }

    public function results(array $data)
    {
        $response = [];
        $response['draws'] = Draw::with('drawTickets')->latest()->paginate(8);

        if ($data['ticket'] && ! is_null($data['ticket'])) {
            $response['ticket'] = Ticket::where('code', $data['ticket'])->first();
        }

        return $response;
    }
}
