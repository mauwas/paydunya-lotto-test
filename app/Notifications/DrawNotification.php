<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DrawNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $ticket;

    protected $benefit;

    protected $jackpot;

    protected $totalWinner;

    /**
     * Create a new notification instance.
     */
    public function __construct($ticket, $jackpot, $totalWinner, $benefit)
    {
        $this->ticket = $ticket;
        $this->jackpot = $jackpot;
        $this->totalWinner = $totalWinner;
        $this->benefit = $benefit;
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
        $isWinner = $this->ticket->drawTicket->is_winner;

        return (new MailMessage)->subject(
            $isWinner ?
            'Félicitations, vous êtes notre gagnant de la loterie!' :
            'Résultats du Tirage de Loterie'
        )->markdown(
            $isWinner ?
            'mails.draw-winner' :
            'mails.draw-losing', [
                'ticket' => $this->ticket,
                'benefit' => $this->benefit,
            ]
        );
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
