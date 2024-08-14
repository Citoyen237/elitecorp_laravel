<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReponseMessage extends Notification
{
    use Queueable;

    public $message, $reponse;
    /**
     * Create a new notification instance.
     */
    public function __construct($message, $reponse)
    {
        //
        $this->message = $message;
        $this->reponse = $reponse;
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
        return (new MailMessage)
                    ->line('Bonjour, Merci pour votre message :')
                    ->line($this->message)
                    ->line('Voici notre reponse')
                    ->line($this->reponse)
                    ->line('L\'équipe de Elitecorp.org');
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
