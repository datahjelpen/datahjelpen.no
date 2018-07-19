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
        // $this->middleware('auth')->except('index');
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
            'name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string|min:3',
        ]);
    }

    public function contact_form(Request $request)
    {
        $this->contact_validator($request->all())->validate();

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

    public function blog()
    {
        Session::flash('info', 'Vi holder på å oppdatere nettstedet vårt. Denne siden kommer snart...');
        return redirect()->route('front-page');
    }

    public function blog1()
    {
        return view('blog1');
    }

    public function blog2()
    {
        return view('blog2');
    }
}
