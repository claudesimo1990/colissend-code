<?php

namespace App\Providers;

use App\Events\NewTransactionCompleted;
use App\Listeners\CatchMails;
use App\Listeners\TransactionCompleted;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class
        ],

        NewTransactionCompleted::class => [
            TransactionCompleted::class,
        ],

        MessageSending::class => [
            CatchMails::class
        ]

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
