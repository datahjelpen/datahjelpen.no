<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;
use Carbon\Carbon;

use App\Jobs\SendEmail;

class SiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('privacy_dpa');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front-page');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        $user = Auth::user();

        if ($user != null) {
            return view('contact', compact('user'));
        }

        return view('contact');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function contact_validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'present', // Honeypot
            'name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|min:3',
        ]);
    }

    public function contact_form(Request $request)
    {
        $this->contact_validator($request->all())->validate();

        if ($request->firstname != null) abort(403);

        dispatch(new SendEmail($request));
        Session::flash('success', 'Din melding ble sendt.');

        return redirect()->route('contact');
    }

    public function services()
    {
        Session::flash('info', 'Vi holder på å oppdatere nettstedet vårt. Denne siden kommer snart...');
        return redirect()->route('front-page');
    }

    public function services_marketing_google_adwords()
    {
        return view('services-marketing-google_adwords');
    }

    public function references()
    {
        Session::flash('info', 'Vi holder på å oppdatere nettstedet vårt. Denne siden kommer snart...');
        return redirect()->route('front-page');
    }

    public function projects()
    {
        Session::flash('info', 'Vi holder på å oppdatere nettstedet vårt. Denne siden kommer snart...');
        return redirect()->route('front-page');
    }

    public function privacy_landing()
    {
        return view('privacy_landing');
    }

    public function privacy_policy()
    {
        return view('privacy_policy');
    }

    public function privacy_dpa()
    {
        $user = Auth::user();

        if (!isset($user->company) || !isset($user->company_nr)) {
            Session::flash('error', 'For å kunne godta vår databehandleravtale, kreves det selskapsnavn og org. nr.');
            return redirect()->back();
        }

        return view('privacy_dpa', compact('user'));
    }
}
