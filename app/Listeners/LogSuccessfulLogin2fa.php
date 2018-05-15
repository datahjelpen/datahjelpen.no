<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FALaravel\Events\LoginSucceeded;

class LogSuccessfulLogin2fa
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
    public function handle(LoginSucceeded $event)
    {
        Log::info('User passed 2fa: ' . $event->user->email);
    }
}
