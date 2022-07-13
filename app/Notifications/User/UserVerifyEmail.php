<?php

namespace App\Notifications\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserVerifyEmail extends Notification
{
    use Queueable;

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $id = $notifiable->id;
        $token = $notifiable->confirmation_token;

        return (new MailMessage)
            ->subject('Verification de votre compte')
            ->view('mail.auth.welcome', ['action' => url("/account/confirmation/{$id}/{$token}")]);
    }

}
