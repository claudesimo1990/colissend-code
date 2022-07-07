<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var \App\Models\Contact
     */
    public $contact;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Contact $contact
     */
    public function __construct(\App\Models\Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): Contact
    {
        return $this->markdown('mail.contact');
    }
}
