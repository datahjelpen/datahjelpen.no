<?php

namespace App\Http\Controllers;

use Auth;
use App\Entry;
use App\EntryType;
use App\EntryContent;
use App\EntryContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntryContentController extends Controller
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'order' => 'nullable|string|max:255',
            'css_id' => 'nullable|string|max:255',
            'css_classlist' => 'nullable|string|max:255',
            'html_content' => 'nullable|string',
        ]);
    }

    public function show(EntryType $entry_type, Entry $entry)
    {
        return view('entry.show', compact('entry_type', 'entry'));
    }

    public function create(EntryType $entry_type, Entry $entry)
    {
        $entry_content_types = EntryContentType::all();
        return view('dashboard.author.entry_content.create', compact('entry_type', 'entry', 'entry_content_types'));
    }

    public function store(Request $request, EntryType $entry_type, Entry $entry)
    {
        $this->validator($request->all())->validate();

        // dump($request);
        // dd($request->entry_content_type);

        $user = Auth::user();

        $entry_content = new EntryContent();
        $entry_content->order = $request->order;
        $entry_content->css_id = $request->css_id;
        $entry_content->css_classlist = $request->css_classlist;
        $entry_content->html_content = $request->html_content;



        $entry_content->entry_id = $entry->id;
        $entry_content->entry_content_type_id = $request->entry_content_type;

        $entry_content->save();

        return redirect()->route('dashboard.author.entry_type', $entry_type);
    }

    public function edit(EntryType $entry_type, Entry $entry, EntryContent $entry_content)
    {
        return view('dashboard.author.entry_content.edit', compact('entry_type', 'entry'));
    }

    public function update(Request $request, EntryType $entry_type, Entry $entry, EntryContent $entry_content)
    {
        $this->validator($request->all())->validate();

        $entry_content->order = $request->order;
        $entry_content->css_id = $request->css_id;
        $entry_content->css_classlist = $request->css_classlist;
        $entry_content->html_content = $request->html_content;
        $entry_content->save();

        return redirect()->route('entry_content.edit', [$entry_type, $entry]);
    }

    public function delete(EntryType $entry_type, Entry $entry, EntryContent $entry_content)
    {
        return view('dashboard.author.entry_content.delete', compact('entry_type', 'entry'));
    }

    public function destroy(EntryType $entry_type, Entry $entry, EntryContent $entry_content)
    {
        $entry_content->delete();
        return redirect()->route('dashboard.author.entry_type', [$entry_type, $entry]);
    }
}
