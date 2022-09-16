<?php

namespace App\Mail;

use Barryvdh\DomPDF\PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessPayment extends Mailable
{
    use Queueable, SerializesModels;

    public PDF $PDF;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PDF $PDF)
    {
        $this->PDF = $PDF;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): static
    {
        $this->attachData($this->PDF->output(), 'invoice.pdf');

        return $this->view('mail.invoice');
    }
}
