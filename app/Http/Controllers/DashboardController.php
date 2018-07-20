<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('deleted');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('user');
        // $user = Auth::user();
        // return view('dashboard.index', compact('user'));
    }
}
