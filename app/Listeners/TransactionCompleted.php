<?php

namespace App\Listeners;

use App\Events\NewTransactionCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
    public function handle(NewTransactionCompleted $event)
    {
       //TODO faire quelquechose apres le payment par le client
    }
}
