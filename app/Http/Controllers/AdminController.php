<?php

namespace App\Http\Controllers;

use Auth;
use App\EntryType;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $entry_types = EntryType::all();

        return view('dashboard.admin.index', compact('user', 'entry_types'));
    }
}
