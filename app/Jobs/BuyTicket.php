<?php

namespace App\Jobs;

use App\Models\Ticket;
use App\Notifications\BuyTicket as NotificationsBuyTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class BuyTicket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ticket;

    protected $invoiceUrl;
    /**
     * Create a new job instance.
     */
    public function __construct(Ticket $ticket, $invoiceUrl)
    {
        $this->ticket = $ticket;
        $this->invoiceUrl = $invoiceUrl;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if ($this->ticket) {
            $this->ticket->user->notify(
                new NotificationsBuyTicket(
                    $this->ticket, $this->invoiceUrl
                )
            );
        }

    }
}
