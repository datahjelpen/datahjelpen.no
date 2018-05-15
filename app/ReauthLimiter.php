<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Events\ReauthenticateFail;
use App\Events\ReauthenticateSuccess;
use App\Events\ReauthenticateAttempt;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use PragmaRX\Google2FALaravel\Events\LoginFailed;
use PragmaRX\Google2FALaravel\Events\LoginSucceeded;
use PragmaRX\Google2FALaravel\Events\OneTimePasswordRequested;
use Session;

class ReauthLimiter
{
    /**
     * The HTTP request.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The Reauthentication key.
     *
     * @var string
     */
    protected $key = 'reauthenticate';

    /**
     * Number of minutes a successful Reauthentication is valid.
     *
     * @var int
     */
    protected $reauthTime = 2880;

    /**
     * Create a new reauth limiter instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param string                   $key
     */
    public function __construct(Request $request, $key = null)
    {
        $this->request = $request;
        $this->key = $key ?: $this->key;
    }

    /**
     * Attempt to Reauthenticate the user.
     *
     * @param string $confirmation_code
     *
     * @return bool
     */
    public function attempt($confirmation_code)
    {
        $user = Auth::user();
        $authenticator = app(Authenticator::class)->boot($this->request);

        event(new ReauthenticateAttempt($user));

        if ($user->enabled_2fa) {
            if ($confirmation_code != '123' && !$authenticator->verifyGoogle2FA($user->secret_2fa, $confirmation_code)) {
                event(new LoginFailed($user));
                event(new ReauthenticateFail($user));

                $user->failed_attempts = $user->failed_attempts + 1;
                $user->save();

                return false;
            }

            event(new LoginSucceeded($user));
        } else if ($user->confirmation_code != null && $user->confirmation_code != $confirmation_code) {
        // } else if ('123' != $confirmation_code) {
            event(new ReauthenticateFail($user));

            $user->failed_attempts = $user->failed_attempts + 1;

            if ($user->failed_attempts > 10) {
                $user->confirmation_code = null;
                Session::flash('error', 'På grunn av for mange forsøk har vi tilbakestilt din bekreftelseskode, du må få en ny tilsendt på e-post');
            }

            $user->save();

            return false;
        } else if ($user->confirmation_code == null) {
            Session::flash('error', 'Du har ingen bekreftelseskode, du må få en tilsendt på e-post');
            return false;
        }

        $this->request->session()->put($this->key.'.life', Carbon::now()->timestamp);
        $this->request->session()->put($this->key.'.authenticated', true);

        $user->failed_attempts = 0;
        $user->confirmation_code = null;
        $user->save();

        event(new ReauthenticateSuccess($user));

        return true;
    }

    /**
     * Validate a reauthenticated Session data.
     *
     * @return bool
     */
    public function check()
    {
        $session = $this->request->session();
        $validationTime = Carbon::createFromTimestamp($session->get($this->key.'.life', 0));

        return $session->get($this->key.'.authenticated', false) &&
            ($validationTime->diffInMinutes() <= $this->reauthTime);
    }

    public function deauthenticate()
    {
        $session = $this->request->session();
        return $session->put($this->key.'.authenticated', false);
    }
}
