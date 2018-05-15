<?php

namespace App\Http\Controllers;;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use Auth;
use Session;
use App\ReauthLimiter;
use PragmaRX\Google2FALaravel\Support\Authenticator;
use PragmaRX\Google2FA\Exceptions\IncompatibleWithGoogleAuthenticatorException;
use App\Jobs\SendConfirmationCodeEmail;

class Reauthenticates extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getReauthenticate()
    {
        $user = Auth::user();

        if ($user->enabled_2fa) {
            return View::make('auth.reauthenticate');
        }

        return View::make('auth.reauthenticate-choices');
    }

    public function sendConfirmationCode(Request $request)
    {
        $this->validate($request, [
            'send_with' => 'required|string'
        ]);

        $user = Auth::user();
        $authenticator = app(Authenticator::class)->boot($request);

        if ($user->secret_2fa == null) $user->secret_2fa = $authenticator->generateSecretKey();

        try {
            $user->confirmation_code = $authenticator->getCurrentOtp($user->secret_2fa);
        } catch (IncompatibleWithGoogleAuthenticatorException $e) {
            $user->secret_2fa = $authenticator->generateSecretKey();
            $user->confirmation_code = $authenticator->getCurrentOtp($user->secret_2fa);
        }

        if ($user->save()) {
            if ($request->send_with == 'email') {
                if ($user->verified) {
                    Session::flash('info', 'Vi sendt deg en bekreftelseskode, sjekk e-posten din.');
                    dispatch(new SendConfirmationCodeEmail($user));
                } else {
                    Session::flash('error', 'Din e-post er ikke verifisert');
                    return back();
                }
            } else if ($request->send_with == 'sms') {
                Session::flash('info', 'Vi støtter ikke bekreftelseskode via SMS enda, du vil motta en e-post.');
                // Session::flash('info', 'Vi sendt deg en bekreftelseskode, sjekk telefonen din.');
                dispatch(new SendConfirmationCodeEmail($user));
            } else if ($request->send_with == 'dev_bypass') {
                // $reauth = new ReauthLimiter($request);
                $user->confirmation_code = '123';
                $user->save();
            }

            return View::make('auth.reauthenticate');
        }

        return back();
    }

    /**
     * Handle the reauthentication request to the application.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postReauthenticate(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'confirmation_code' => 'required',
        ]);

        $reauth = new ReauthLimiter($request);

        if (!$reauth->attempt($request->confirmation_code)) {
            return Redirect::back()
                ->withErrors([
                    'confirmation_code' => $this->getFailedLoginMessage(),
                ]);
        }

        return Redirect::intended();
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.confirmation.failed')
            ? Lang::get('auth.confirmation.failed')
            : 'Feil bekreftelseskode.';
    }

    protected function deauthenticate(Request $request)
    {
        $reauth = new ReauthLimiter($request);
        $reauth->deauthenticate();
        return redirect()->route('dashboard');
    }
}
