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

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified')->except('verify');
        $this->middleware('reauthenticate')->only([
            'show_settings_security',
            'update',
            'disable_2fa_complete'
        ]);
        $this->middleware('2fa')->only('setup_2fa_complete');
    }

    public function show(Request $request, User $user = null)
    {
        $current_user = Auth::user();
        if ($user === null) $user = $current_user;

        if ($current_user->avatar) {
            $current_user->avatar->url = Storage::temporaryUrl(
                $current_user->avatar->url, now()->addMinutes(30)
            );
        } else {
            $current_user->avatar = new \StdClass;
            $current_user->avatar->url = config('app.user.default_image');
            $current_user->avatar->alt_tag = config('app.user.default_image');
        }

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

    public function update(Request $request, User $user = null)
    {
        $current_user = Auth::user();
        $user_info_updated = false;

        if ($user->hasProvider()) {
            Session::flash('Error', 'Du er logget inn med en oAuth klient og kan ikke endre e-post eller passord.');
            return redirect()->back();
        }

        if ($request->has('email')) {
            if ($current_user->email == $request->email) {
                Session::flash('info', 'Din gjeldene e-post er identisk');
                return redirect()->back();
            }

            $this->validate($request, [
                'email' => 'required|string|email|max:255|unique:users'
            ]);

            $current_user->email = $request->email;
            $user_info_updated = true;
        }

        if ($request->has('password')) {
            $this->validate($request, [
                'password_current' => 'required|string',
                'password' => 'required|string|min:6|confirmed'
            ]);

            $credentials = [
                'email' => $current_user->email,
                'password' => $request->password_current
            ];

            if (Auth::attempt($credentials)) {
                $current_user->password = Hash::make($request->password);
                $user_info_updated = true;
            } else {
                Session::flash('error', 'Feil passord');
            }
        }

        if ($user_info_updated) {
            if ($current_user->save()) {
                Session::flash('success', 'Konto oppdatert');
            } else {
                Session::flash('error', 'Noe gikk galt. Vi kunne ikke oppdatere din konto.');
            }
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

            return view('auth.setup_2fa', compact(['user', 'qr_img']));
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

        return view('user.security-disable-2fa', compact('user'));
    }

    public function disable_2fa_complete()
    {
        $user = Auth::user();

        if (!$user->enabled_2fa) {
            Session::flash('info', 'Du har ikke satt opp to-faktor autentisering.');
            return redirect()->route('user.settings.security');
        }

        $user->enabled_2fa = false;
        $user->secret_2fa = null;

        if ($user->save()) {
            Session::flash('success', 'Du har nå skrudd av to-faktor autentisering.');
            return redirect()->route('user.settings.security');
        }

        Session::flash('error', 'Noe gikk galt, vi kunne ikke fullføre deaktiveringen av to-faktor autentisering');
        return redirect()->route('user.settings.security');
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
}
