<?php

namespace App\Http\Controllers;

use Auth;
use App\EntryType;
use App\EntryContentType;
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
        return view('dashboard.admin.index', compact('user'));
    }

    public function entry_types()
    {
        $entry_types = EntryType::all();

        return view('dashboard.admin.entry_type.index', compact('entry_types'));
    }

    public function entry_content_types()
    {
        $entry_content_types = EntryContentType::all();

        return view('dashboard.admin.entry_content_type.index', compact('entry_content_types'));
    }
}
