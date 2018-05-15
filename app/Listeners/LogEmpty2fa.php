<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;
use PragmaRX\Google2FALaravel\Events\EmptyOneTimePasswordReceived;

class LogEmpty2fa
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
    public function handle(EmptyOneTimePasswordReceived $event)
    {
        Log::info('Received empty 2fa key');
    }
}
