<?php

namespace App\Listeners;

use App\Events\NewTransactionCompleted;
use App\Mail\SuccessPayment;
use App\Repository\CartRepository;
use Auth;
use Exception;
use Illuminate\Support\Facades\Mail;

class TransactionCompleted
{
    private CartRepository $cartRepository;

    /**
     * Create the event listener.
     *
     * @param CartRepository $cartRepository
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Handle the event.
     *
     * @param NewTransactionCompleted $event
     * @return void
     * @throws Exception
     */
    public function handle(NewTransactionCompleted $event): void
    {
        $details = [
            'name' => Auth::user()->firstname . ' ' . Auth::user()->lastname,
            'street' => Auth::user()->profile->street,
            'city' => Auth::user()->profile->city,
            'phone' => Auth::user()->profile->phone,
            'email' => Auth::user()->email,

            'invoice_number' =>  uniqid(),
            'order_number' =>  $event->order->order_number,
            'order_date' =>    formatDate($event->order->created_at),
            'shipped_date' =>    formatDate($event->order->created_at->addDays(4)),

            'products' => $event->order->products,

            'total' => $this->cartRepository->total()
        ];

       //TODO Generer la facture
        $pdf = \PDF::loadView('pdf.invoice', compact('details'));

       //TODO Attacher la facture a l email et l envoyer au client.
        Mail::to(env('ADMIN_EMAIL'), Auth::user()->email)
            ->send(new SuccessPayment($pdf));

        //TODO Cart destroy and redirect back
        $this->cartRepository->clear();
    }
}
