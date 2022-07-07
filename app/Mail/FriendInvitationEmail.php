<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FriendInvitationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function build()
    {
        $this->subject = 'Invitation à rejoindre Colissend';

        return $this->markdown('mail.invitation');
    }
}
