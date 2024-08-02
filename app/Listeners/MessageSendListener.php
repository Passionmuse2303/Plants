<?php

namespace App\Listeners;

use App\Events\MessageSend;
use Illuminate\Support\Facades\Log;

class MessageSendListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSend $event): void
    {
        // Handle the event logic
        // For example, log the message
        Log::info('Message sent: ', ['message' => $event->message]);
    }
}
