<?php

namespace App\Listeners;

use App\Events\ReauthenticateSuccess;
use Illuminate\Support\Facades\Log;

class LogSuccessfulReauth
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
     * @param  ReauthenticateSuccess  $event
     * @return void
     */
    public function handle(ReauthenticateSuccess $event)
    {
        Log::info('User reauthentication success: ' . $event->user->email);
    }
}
