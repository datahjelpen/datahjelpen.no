<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use guzzlehttp\guzzle\src\Exception\RequestException;
use Carbon\Carbon;

use Log;
use Auth;
use Storage;
use Session;
use Socialite;
use ImageEditor;

use App\User;
use App\Image;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function oauthTos(String $provider)
    {
        $user_data = session('user_data');

        if ($user_data != null) {
            return view('auth.oauth-tos', compact('provider', 'user_data'));
        }

        Session::flash('error', 'Noe gikk galt, denne siden trenger cookies for å fungere.');
        return redirect()->route('login');
    }

    public function oauthComplete(Request $request, String $provider)
    {
        $this->validate($request, [
            'agree_to_tos_privacy' => 'accepted',
            'user_name'   => 'required|string',
            'user_email'  => 'required|email',
            // 'user_avatar' => 'image',
        ]);


        $user_data = session('user_data');
        if ($user_data != null) {
            $existing_user = User::where('email', $user_data->email)->first();

            if ($existing_user) {
                Session::flash('error', 'Noe gikk galt, denne brukeren finnes allerede.');
                return redirect()->route('login');
            }

            $now = Carbon::now()->toDateTimeString();
            $user = new User;
            $user->name = $request->user_name;
            $user->email = $user_data->email;
            $user->provider = $user_data->provider;
            $user->provider_id = $user_data->provider_id;
            $user->verified = true;
            $user->agree_tos = true;
            $user->agree_tos_latest = $now;
            $user->agree_privacy = true;
            $user->agree_privacy_latest = $now;

            $user->save();

            $user_data->avatar = null;
            if ($request->has('user_avatar')) {
                $user_data->avatar = $request->user_avatar;
            }

            // Try to get the user's avatar
            if ($user_data->avatar != null) {
                try {
                    $image_edit = ImageEditor::make( $user_data->avatar );
                    $new_user_image = new Image;
                    $new_user_image->size_name = 'full';
                    $image_edit->widen(512,    function ($constraint) { $constraint->upsize(); });
                    $image_edit->heighten(512, function ($constraint) { $constraint->upsize(); });
                    $new_user_image->alt_tag = $user->name . ' avatar';
                    $new_user_image->size_width = $image_edit->width();
                    $new_user_image->size_height = $image_edit->height();
                    $new_user_image->url = 'avatars/full/' . str_random(20) . '.jpg';
                    Storage::put($new_user_image->url, $image_edit->stream('jpg', 90)->__toString());
                    $new_user_image->save();
                    $user->image_id = $new_user_image->id;
                    $user->save();
                } catch (\Intervention\Image\Exception\NotReadableException $e) {
                    Log::error($e);
                } catch (Exception $e) {
                    Log::error($e);
                }
            }

            // Login the user
            Auth::login($user);

            return redirect()->route('dashboard');
        }

        Session::flash('error', 'Noe gikk galt, denne siden trenger cookies for å fungere.');
        return redirect()->route('login');

    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(String $provider)
    {
        if ($provider == 'google') {
            return Socialite::driver($provider)->redirect();
        }

        return redirect()->route('login');
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(String $provider)
    {
        $existing_user = false;
        $same_user = false;
        $used_authorized_provder = false;

        if ($provider == 'google') {
            $used_authorized_provder = true;

            // Get the user from Google
            $google_provider = Socialite::driver($provider)->stateless();
            $google_user = $google_provider->user();

            $user_data = new \stdClass;
            $user_data->name = $google_user->getName();
            $user_data->email = $google_user->getEmail();
            $user_data->provider = $provider;
            $user_data->provider_id = $google_user->getId();
            // We change from https to http because Intervention\Image seems to be not always be able to use https URLs...
            // $user_data->avatar = str_replace('https://', 'http://', str_replace('?sz=50', '?sz=512', $google_user->getAvatar()));
        }

        if ($used_authorized_provder) {
            // Check if we already have this user in our db
            $existing_user = User::where('email', $user_data->email)->first();

            if ($existing_user) {
                // Make sure user has a provider
                if ($existing_user->provider != null && $existing_user->provider_id != null) {
                    if ($existing_user->provider == $user_data->provider && $existing_user->provider_id == $user_data->provider_id) {
                        // User is the same as existing, login
                        Auth::login($existing_user);
                        return redirect()->route('dashboard');
                    } else {
                        // User is provided by another provider
                        Session::flash('error', 'Denne e-posten er allerede i bruk av en konto via ' . $existing_user->provider);
                    }
                } else {
                    // User doesn't have a provider
                    // This means the user registered manually with email and password
                    if ($existing_user->verified) {
                        Session::flash('error', 'Denne e-posten er allerede i bruk, og er verifisert. Dette betyr at du sannsynligvis satt opp en bruker manuelt. Forsøk å logge inn med e-post og passord.');
                    } else {
                        Session::flash('error', 'Denne e-posten er allerede i bruk, men ikke verifisert. Kontakt oss for hjelp (' . config("app.email_support") . ')');
                    }
                }

                return redirect()->route('login');
            }

            // We didn't have the user in our db.
            // Save user_data in session and send user to complete registration
            session(['user_data' => $user_data]);
            return redirect()->route('login.oauth.tos', $provider);
        } else {
            Session::flash('error', 'Beklager, noe gikk galt under login.');
        }

        return redirect()->route('login');
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->route('goodbye');
    }
}
