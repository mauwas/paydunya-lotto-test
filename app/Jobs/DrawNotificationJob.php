<?php

namespace App\Jobs;

use App\Models\Draw;
use App\Models\Jackpot;
use App\Models\Ticket;
use App\Notifications\DrawNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DrawNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $draw;

    protected $benefit;

    protected $jackpot;

    protected $totalWinner;

    /**
     * Create a new job instance.
     */
    public function __construct(Draw $draw, Jackpot $jackpot, $totalWinner, $benefit)
    {
        $this->draw = $draw;
        $this->jackpot = $jackpot;
        $this->totalWinner = $totalWinner;
        $this->benefit = $benefit;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($tickets = $this->getTicketsByDraw()) {
            foreach ($tickets as $ticket) {
                $ticket->user->notify(
                    new DrawNotification(
                        $ticket,
                        $this->jackpot,
                        $this->totalWinner,
                        $this->benefit
                    )
                ); // envoie de chaque notification
            }
        }
    }

    protected function getTicketsByDraw()
    {
        // récupérer les tickets ayant du tirage avec leur partcipant
        return Ticket::with(['user', 'drawTicket'])->whereHas('drawTicket', function ($query) {
            $query->where('draw_id', $this->draw->id);
        })->get();
    }
}
