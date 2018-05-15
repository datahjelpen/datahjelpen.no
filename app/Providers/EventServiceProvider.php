<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Registration
        'Illuminate\Auth\Events\Registered' => [
            'App\Listeners\RegisteredUser',
        ],

        // Authentication
        'Illuminate\Auth\Events\Attempting' => [
            'App\Listeners\LogAuthenticationAttempt',
        ],

        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogSuccessfulLogin',
        ],

        'Illuminate\Auth\Events\Failed' => [
            'App\Listeners\LogFailedLogin',
        ],

        'Illuminate\Auth\Events\Logout' => [
            'App\Listeners\LogSuccessfulLogout',
        ],

        'Illuminate\Auth\Events\Lockout' => [
            'App\Listeners\LogLockout',
        ],

        'Illuminate\Auth\Events\PasswordReset' => [
            'App\Listeners\LogPasswordReset',
        ],

        // Email
        'Illuminate\Mail\Events\MessageSending' => [
            'App\Listeners\LogSendingMessage',
        ],

        'Illuminate\Mail\Events\MessageSent' => [
            'App\Listeners\LogSentMessage',
        ],

        'App\Events\EmailVerified' => [
            'App\Listeners\LogEmailVerified',
        ],

        // Reauthentication
        'App\Events\ReauthenticateAttempt' => [
            'App\Listeners\LogReauthAttempt',
        ],

        'App\Events\ReauthenticateSuccess' => [
            'App\Listeners\LogSuccessfulReauth',
        ],

        'App\Events\ReauthenticateFail' => [
            'App\Listeners\LogFailedReauth',
        ],

        // 2FA
        'PragmaRX\Google2FALaravel\Events\LoginSucceeded' => [
            'App\Listeners\LogSuccessfulLogin2fa',
        ],

        'PragmaRX\Google2FALaravel\Events\LoginFailed' => [
            'App\Listeners\LogFailedLogin2fa',
        ],

        'PragmaRX\Google2FALaravel\Events\OneTimePasswordRequested' => [
            'App\Listeners\LogRequest2fa',
        ],

        'PragmaRX\Google2FALaravel\Events\EmptyOneTimePasswordReceived' => [
            'App\Listeners\LogEmpty2fa',
        ],

        'PragmaRX\Google2FALaravel\Events\OneTimePasswordExpired' => [
            'App\Listeners\LogExpired2fa',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
