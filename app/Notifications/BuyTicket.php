<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BuyTicket extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket;
    protected $invoiceUrl;

    /**
     * Create a new notification instance.
     */
    public function __construct(Ticket $ticket, $invoiceUrl)
    {
        $this->ticket = $ticket;
        $this->invoiceUrl = $invoiceUrl;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {


        return (new MailMessage)->subject("Notification pour achat de ticket PayDunya Lotto")
                ->markdown('mails.ticket-invoice', [
                    'ticket' => $this->ticket,
                    'invoiceUrl' => $this->invoiceUrl,
                ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
