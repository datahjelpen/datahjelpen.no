<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FALaravel\Events\OneTimePasswordRequested;

class LogRequest2fa
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
     * @param  Login  $event
     * @return void
     */
    public function handle(OneTimePasswordRequested $event)
    {
        Log::info('Requested 2fa key: ' . $event->user->email);
    }
}
