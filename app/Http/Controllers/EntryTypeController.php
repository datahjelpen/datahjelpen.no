<?php

namespace App\Http\Controllers;

use Auth;
use App\EntryType;
use Illuminate\Http\Request;

class EntryTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:author')->only('index');
        $this->middleware('role:admin')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(EntryType $entry_type)
    {
        return view('dashboard.author.entry_type.index', compact('entry_type'));
    }
}
