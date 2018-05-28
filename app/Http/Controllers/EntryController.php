<?php

namespace App\Http\Controllers;

use Auth;
use App\Entry;
use App\EntryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:author');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $entry_id = null)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'css_id' => 'nullable|string|max:255',
            'css_classlist' => 'nullable|string|max:255',
        ]);
    }

    public function show(EntryType $entry_type, Entry $entry)
    {
        return view('entry.show', compact('entry_type', 'entry'));
    }

    public function create(EntryType $entry_type)
    {
        return view('dashboard.author.entry.create', compact('entry_type'));
    }

    public function store(Request $request, EntryType $entry_type)
    {
        $this->validator($request->all())->validate();

        $user = Auth::user();

        $entry = new Entry();
        $entry->name = $request->name;
        $entry->css_id = $request->css_id;
        $entry->css_classlist = $request->css_classlist;
        $entry->entry_type_id = $entry_type->id;
        $entry->author_id = $user->id;

        $entry->save();

        return redirect()->route('dashboard.author.entry_type', $entry_type);
    }

    public function edit(EntryType $entry_type, Entry $entry)
    {
        return view('dashboard.author.entry.edit', compact('entry_type', 'entry'));
    }

    public function update(Request $request, EntryType $entry_type, Entry $entry)
    {
        $this->validator($request->all(), $entry->id)->validate();

        $entry->name = $request->name;
        $entry->css_id = $request->css_id;
        $entry->css_classlist = $request->css_classlist;
        $entry->save();

        return redirect()->route('entry.edit', [$entry_type, $entry]);
    }

    public function delete(EntryType $entry_type, Entry $entry)
    {
        return view('dashboard.author.entry.delete', compact('entry_type', 'entry'));
    }

    public function destroy(EntryType $entry_type, Entry $entry)
    {
        $entry->delete();
        return redirect()->route('dashboard.author.entry_type', [$entry_type, $entry]);
    }
}
