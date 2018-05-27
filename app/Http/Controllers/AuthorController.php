<?php

namespace App\Http\Controllers;

use Auth;
use App\EntryType;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:author']);
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

        return view('dashboard.author.index', compact('user', 'entry_types'));
    }

    public function entry_type(EntryType $entry_type)
    {
        return view('dashboard.author.entry_type.show', compact('entry_type'));
    }
}
