<?php

namespace App\Listeners;

use App\Events\ReauthenticateFail;
use Illuminate\Support\Facades\Log;

class LogFailedReauth
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
     * @param  ReauthenticateFail  $event
     * @return void
     */
    public function handle(ReauthenticateFail $event)
    {
        Log::info('User reauthentication failed: ' . $event->user->email);
    }
}
