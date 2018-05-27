<?php

namespace App\Http\Controllers;

use Auth;
use App\EntryContentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntryContentTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $entry_content_type_id = null)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'css_classlist' => 'nullable|string|max:255',
            'html_tag_open' => 'required|string|max:255',
            'html_tag_close' => 'nullable|string|max:255',
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.entry_content_type.create');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $entry_content_type = new EntryContentType();
        $entry_content_type->name = $request->name;
        $entry_content_type->icon = $request->icon;
        $entry_content_type->css_classlist = $request->css_classlist;
        $entry_content_type->html_tag_open = $request->html_tag_open;
        $entry_content_type->html_tag_close = $request->html_tag_close;
        $entry_content_type->save();

        return redirect()->route('dashboard.admin.entry_content_types');
    }

    public function edit(EntryContentType $entry_content_type)
    {
        return view('dashboard.admin.entry_content_type.edit', compact('entry_content_type'));
    }

    public function update(Request $request, EntryContentType $entry_content_type)
    {
        $this->validator($request->all(), $entry_content_type->id)->validate();

        $entry_content_type->name = $request->name;
        $entry_content_type->icon = $request->icon;
        $entry_content_type->css_classlist = $request->css_classlist;
        $entry_content_type->html_tag_open = $request->html_tag_open;
        $entry_content_type->html_tag_close = $request->html_tag_close;
        $entry_content_type->save();

        return redirect()->route('entry_content_type.edit', $entry_content_type);
    }

    public function delete(EntryContentType $entry_content_type)
    {
        return view('dashboard.admin.entry_content_type.delete', compact('entry_content_type'));
    }

    public function destroy(EntryContentType $entry_content_type)
    {
        $entry_content_type->delete();
        return redirect()->route('dashboard.admin.entry_content_types');
    }
}
