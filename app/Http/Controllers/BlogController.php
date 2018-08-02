<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;
use Carbon\Carbon;

use App\Entry;
use App\EntryType;
use App\EntryContent;
use App\EntryContentType;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'create',
            'store',
            'edit',
            'update',
            'delete',
            'destroy'
        ]);

        $this->middleware('role:author')->only([
            'create',
            'store',
            'edit',
            'update',
            'delete',
            'destroy'
        ]);
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

    public function dashboard()
    {
        $entries = Entry::all();
        return view('blog.dashboard', compact('entries'));
    }

    public function blog1()
    {
        return view('blog1');
    }

    public function blog2()
    {
        return view('blog2');
    }


    // public function show(EntryType $entry_type, Entry $entry)
    // {
    //     return view('entry.show', compact('entry_type', 'entry'));
    // }


    public function show($entry)
    {
        $entry = Entry::where('name', 'like', '%'.$entry.'%')
        ->orWhere('name', 'like', '%'.str_slug($entry).'%')
        ->orWhere('name', 'like', '%'.urldecode($entry).'%')
        ->orWhere('name', 'like', '%'.ucwords(str_replace('-', ' ', $entry)).'%')
        ->firstOrFail();

        return view('blog.entry.show', compact('entry'));
    }

    public function create()
    {
        return view('blog.entry.create');
    }

    protected function validator(array $data, $entry_id = null)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            // 'category' => 'nullable|integer',
            'entry_type' => 'nullable|string',
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();

        $entry_type = EntryType::where('slug', $request->entry_type)->firstOrFail();

        $entry = new Entry;
        $entry->name = $request->title;
        $entry->author_id = $user->id;
        $entry->entry_type_id = $entry_type->id;

        if ($entry->save()) {
            Session::flash('success', 'Din post ble lagret.');
        } else {
            Session::flash('error', 'Noe gikk galt, vi kunne ikke lagre din post.');
        }

        return redirect()->route('blog.dashboard');
    }

    public function edit(Entry $entry)
    {
        return view('blog.entry.create', compact('entry'));
    }

    public function update(Request $request, Entry $entry)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();

        $entry_type = EntryType::where('slug', $request->entry_type)->firstOrFail();

        $entry->name = $request->title;
        $entry->author_id = $user->id;
        $entry->entry_type_id = $entry_type->id;

        if ($entry->save()) {
            Session::flash('success', 'Din post ble lagret.');
        } else {
            Session::flash('error', 'Noe gikk galt, vi kunne ikke lagre din post.');
        }

        return view('blog.entry.create', compact('entry'));
    }

    public function delete(Entry $entry)
    {
        return view('dashboard.author.entry.delete', compact('entry_type', 'entry'));
    }

    public function destroy(Entry $entry)
    {
        $entry->delete();
        return redirect()->route('dashboard.author.entry_type', [$entry_type, $entry]);
    }
}
