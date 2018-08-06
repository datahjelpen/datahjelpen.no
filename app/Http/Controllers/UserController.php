<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Storage;
use Auth;
use Session;
use Carbon\Carbon;
use App\User;
use App\Events\EmailVerified;
use PragmaRX\Google2FALaravel\Support\Authenticator;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('deleted');
        $this->middleware('deleted')->except('deleted');
        $this->middleware('verified')->except(['show', 'verify', 'deleted']);
        $this->middleware('reauthenticate')->only([
            'show_settings_security',
            'update_sensitive',
            'disable_2fa_complete'
        ]);
        $this->middleware('2fa')->only('setup_2fa_complete');
    }

    public function show(Request $request, User $user = null)
    {
        $current_user = Auth::user();
        // if ($user === null) $user = $current_user;
        $user = $current_user;

        $current_user->avatar->url = Storage::temporaryUrl(
            $current_user->avatar->url, now()->addMinutes(30)
        );

        return view('user.show', compact('user', 'current_user'));
    }


    public function show_settings(Request $request)
    {
        $user = Auth::user();

        return view('user.settings.show', compact('user'));
    }

    public function show_settings_security(Request $request)
    {
        $user = Auth::user();

        $is_reauthenticated = $request->session()->get('reauthenticate.authenticated', false);
        $reauthenticated_time = Carbon::createFromTimestamp($request->session()->get('reauthenticate.life', 0));
        $reauthenticated_time_remaining = 30 - $reauthenticated_time->diffInMinutes();

        return view('user.settings.security.show', compact('user', 'is_reauthenticated', 'reauthenticated_time_remaining'));
    }

    public function edit(Request $request, User $user = null)
    {
        $current_user = Auth::user();
        // if ($user === null) $user = $current_user;
        $user = $current_user;

        $current_user->avatar->url = Storage::temporaryUrl(
            $current_user->avatar->url, now()->addMinutes(30)
        );

        return view('user.edit', compact('user', 'current_user'));
    }

    public function update_sensitive(Request $request, User $user = null)
    {
        $current_user = Auth::user();
        // if ($user === null) $user = $current_user;
        $user = $current_user;
        $user_info_updated = false;

        if ($request->has('email')) {
            if ($user->hasProvider()) {
                Session::flash('error', 'Du er logget inn med en oAuth klient og kan ikke endre e-post eller passord.');
                return redirect()->back();
            }

            if ($user->email == $request->email) {
                Session::flash('info', 'Din gjeldene e-post er identisk');
                return redirect()->back();
            }

            $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users'
            ]);

            $user->email = $request->email;
            $user_info_updated = true;
        }

        if ($request->has('password')) {
            if ($user->hasProvider()) {
                Session::flash('error', 'Du er logget inn med en oAuth klient og kan ikke endre e-post eller passord.');
                return redirect()->back();
            }

            $this->validate($request, [
                'password_current' => 'required|string'
            ]);

            $credentials = [
                'email' => $user->email,
                'password' => $request->password_current
            ];

            if (Auth::attempt($credentials)) {
                $this->validate($request, [
                    'password' => 'required|string|min:6|confirmed'
                ]);

                $user->password = Hash::make($request->password);
                $user_info_updated = true;
            } else {
                Session::flash('error', 'Feil passord');
            }
        }

        if ($user_info_updated) {
            if ($user->save()) {
                Session::flash('success', 'Konto oppdatert');
            } else {
                Session::flash('error', 'Noe gikk galt. Vi kunne ikke oppdatere din konto.');
            }
        } else {
            Session::flash('info', 'Ingenting ble endret.');
        }

        return redirect()->back();
    }

    public function update(Request $request, User $user = null)
    {
        $current_user = Auth::user();
        // if ($user === null) $user = $current_user;
        $user = $current_user;
        $user_info_updated = false;
        $now = Carbon::now()->toDateTimeString();

        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'company' => 'nullable|string',
            'company_nr' => 'nullable|string',
            'agree_tos' => 'nullable',
            'agree_privacy' => 'nullable',
            'agree_dpa' => 'nullable'
        ]);

        $user->name =                 $request->name;
        $user->phone =                $request->phone;
        $user->company =              $request->company;
        $user->company_nr =           $request->company_nr;

        $user->agree_tos =            $request->has('agree_tos')     ? true : false;
        $user->agree_tos_latest =     $request->has('agree_tos')     ? $now : null;

        $user->agree_privacy =        $request->has('agree_privacy') ? true : false;
        $user->agree_privacy_latest = $request->has('agree_privacy') ? $now : null;

        $user->agree_dpa =            $request->has('agree_dpa')     ? true : false;
        $user->agree_dpa_latest =     $request->has('agree_dpa')     ? $now : null;

        $user_info_updated = true;

        if ($user_info_updated) {
            if ($user->save()) {
                Session::flash('success', 'Konto oppdatert');
            } else {
                Session::flash('error', 'Noe gikk galt. Vi kunne ikke oppdatere din konto.');
            }
        } else {
            Session::flash('info', 'Ingenting ble endret.');
        }

        return redirect()->back();
    }

    public function setup_2fa(Request $request)
    {
        $user = Auth::user();

        if ($user->enabled_2fa) {
            Session::flash('info', 'Du har allerede satt opp to-faktor autentisering.');
            return redirect()->route('user.settings.security');
        }

        $google2fa = app('pragmarx.google2fa');

        if ($user->secret_2fa == null) $user->secret_2fa = $google2fa->generateSecretKey();
        if ($user->save()) {
            $qr_img = $google2fa->getQRCodeInline(
                config('app.name'),
                config('app.name') . ' - ' . $user->email,
                $user->secret_2fa
            );

            return view('user.settings.security.setup-2fa', compact(['user', 'qr_img']));
        }

        Session::flash('error', 'Noe gikk galt, vi kunne ikke sette opp to-faktor autentisering');
        return redirect()->route('user.settings.security');
    }

    public function setup_2fa_new_secret(Request $request)
    {
        $user = Auth::user();

        if ($user->enabled_2fa) {
            Session::flash('info', 'Du har allerede satt opp to-faktor autentisering.');
            return redirect()->route('user.settings.security');
        }

        $google2fa = app('pragmarx.google2fa');
        $user->secret_2fa = $google2fa->generateSecretKey();
        $user->save();

        $qr_img = $google2fa->getQRCodeInline(
            config('app.name'),
            config('app.name') . ' - ' . $user->email,
            $user->secret_2fa
        );

        if ($request->ajax()) {
            return compact('qr_img', 'user');
        }

        return back();
    }

    public function setup_2fa_complete()
    {
        $user = Auth::user();

        if ($user->enabled_2fa) {
            Session::flash('info', 'Du har allerede satt opp to-faktor autentisering.');
            return redirect()->route('user.settings.security');
        }

        if ($user->secret_2fa == null) {
            return redirect()->route('user.setup_2fa');
        }

        $user->enabled_2fa = true;

        if ($user->save()) {
            Session::flash('success', 'Du har nå skrudd på to-faktor autentisering.');
                return redirect()->route('user.settings.security');
            }

            Session::flash('error', 'Noe gikk galt, vi kunne ikke fullføre oppsetting av to-faktor autentisering');
            return redirect()->route('user.settings.security');
        }

    public function disable_2fa()
    {
        $user = Auth::user();

        if (!$user->enabled_2fa) {
            Session::flash('info', 'Du har ikke satt opp to-faktor autentisering.');
            return redirect()->route('user.settings.security');
        }

        return view('user.settings.security.disable-2fa', compact('user'));
    }

    public function disable_2fa_complete(Request $request)
    {
        $user = Auth::user();

        // Make sure user has turned on 2fa
        if (!$user->enabled_2fa) {
            Session::flash('info', 'Du har ikke satt opp to-faktor autentisering.');
            return redirect()->route('user.settings.security');
        }

        $this->validate($request, [
            'one_time_password' => 'required|string'
        ]);

        $authenticator = app(Authenticator::class)->boot($request);
        if ($authenticator->verifyGoogle2FA($user->secret_2fa, $request->one_time_password)) {

            $user->enabled_2fa = false;
            $user->secret_2fa = null;

        if ($user->save()) {
            Session::flash('success', 'Du har nå skrudd av to-faktor autentisering.');
            return redirect()->route('user.settings.security');
        }

        Session::flash('error', 'Noe gikk galt, vi kunne ikke fullføre deaktiveringen av to-faktor autentisering');
        return redirect()->route('user.settings.security');
    }

        Session::flash('error', 'Feil engangskode');
        return redirect()->route('user.disable_2fa');
    }

    public function verify($token)
    {
        $user = Auth::user();

        if ($user->verified) {
            Session::flash('info', 'Din e-post er allerede verifisert');
            return redirect()->route('home');
        }

        if ($user->email_token == $token) {
            $user->verified = true;
            $user->email_token = NULL;
            $user->assignRole('user_vl1');

            event(new EmailVerified($user));

            if ($user->save()) {
                return view('user.verify-success', ['user' => $user]);
            }
        } else {
            Session::flash('error', 'Feil verifiseringskode for e-post');
        }

        return redirect()->route('home');
    }

    public function delete()
    {
        $user = Auth::user();

        return view('user.delete', compact('user'));
    }

    public function deleted()
    {
        if (Auth::check()) {
            $user = Auth::user();

            if (!$user->delete) {
                return redirect()->route('front-page');
            }
        }

        return view('user.deleted');
    }

    public function destroy(Request $request, User $user = null)
    {
        $current_user = Auth::user();
        // if ($user === null) $user = $current_user;
        $user = $current_user;

        $user->delete = true;
        $user->save();

        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->route('user.deleted');
    }
}
