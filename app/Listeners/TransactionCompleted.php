<?php

namespace App\Listeners;

use App\Events\NewTransactionCompleted;
use App\Mail\SuccessPayment;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class TransactionCompleted
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param NewTransactionCompleted $event
     * @return void
     */
    public function handle(NewTransactionCompleted $event): void
    {
       //TODO Generer la facture
        $pdf = PDF::loadView('pdf.invoice');

       //TODO Attacher la facture a l email et l envoyer au client.
        Mail::to(env('ADMIN_EMAIL'))
            ->send(new SuccessPayment($pdf));
    }
}
