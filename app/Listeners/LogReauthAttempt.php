<?php

namespace App\Listeners;

use App\Events\ReauthenticateAttempt;
use Illuminate\Support\Facades\Log;

class LogReauthAttempt
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
     * @param  ReauthenticateAttempt  $event
     * @return void
     */
    public function handle(ReauthenticateAttempt $event)
    {
        Log::info('User reauthentication attempt: ' . $event->user->email);
    }
}
