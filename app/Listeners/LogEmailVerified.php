<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;

use App\Events\EmailVerified;

class LogEmailVerified
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
     * @param  EmailVerified $event
     * @return void
     */
    public function handle(EmailVerified $event)
    {
        Log::info('User verified email successfully: ' . $event->user->email);
    }
}
