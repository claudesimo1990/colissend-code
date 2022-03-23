<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserVerifyEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        $id = $notifiable->id;
        $token = $notifiable->confirmation_token;

        return (new MailMessage)
                    ->subject('Verification de votre compte')
                    ->line('Votre compte a ete bien creer, veuillez cliquer sur le lien ci-dessous pour verifier votre compte.')
                    ->action('Verifier votre compte', url("/account/confirmation/{$id}/{$token}"))
                    ->line('Merci de nous faire confiance!')
                    ->salutation('Colissend');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
