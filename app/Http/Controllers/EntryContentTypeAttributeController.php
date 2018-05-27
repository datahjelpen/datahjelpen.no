<?php

namespace App\Http\Controllers;

use Auth;
use App\EntryContentType;
use App\EntryContentTypeAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntryContentTypeAttributeController extends Controller
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'html_attribute' => 'required|string|max:255',
            'required' => 'required|boolean',
        ]);
    }

    public function create(EntryContentType $entry_content_type)
    {
        return view('dashboard.admin.entry_content_type_attribute.create', compact('entry_content_type'));
    }

    public function store(Request $request, EntryContentType $entry_content_type)
    {
        $this->validator($request->all())->validate();

        $entry_content_type_attribute = new EntryContentTypeAttribute();
        $entry_content_type_attribute->name = $request->name;
        $entry_content_type_attribute->html_attribute = $request->html_attribute;
        $entry_content_type_attribute->required = $request->required;
        // TODO: Fix this (relationship): $entry_content_type_attribute->content_type->associate($entry_content_type);
        $entry_content_type_attribute->entry_content_type_id = $entry_content_type->id;
        $entry_content_type_attribute->save();

        return redirect()->route('dashboard.admin.entry_content_types');
    }

    public function edit(EntryContentType $entry_content_type, EntryContentTypeAttribute $entry_content_type_attribute)
    {
        return view('dashboard.admin.entry_content_type_attribute.edit', compact('entry_content_type', 'entry_content_type_attribute'));
    }

    public function update(Request $request, EntryContentType $entry_content_type, EntryContentTypeAttribute $entry_content_type_attribute)
    {
        $this->validator($request->all(), $entry_content_type_attribute->id)->validate();

        $entry_content_type_attribute->name = $request->name;
        $entry_content_type_attribute->html_attribute = $request->html_attribute;
        $entry_content_type_attribute->required = $request->required;
        $entry_content_type_attribute->save();

        return redirect()->route('entry_content_type_attribute.edit', [$entry_content_type, $entry_content_type_attribute]);
    }

    public function delete(EntryContentType $entry_content_type, EntryContentTypeAttribute $entry_content_type_attribute)
    {
        return view('dashboard.admin.entry_content_type_attribute.delete', compact('entry_content_type', 'entry_content_type_attribute'));
    }

    public function destroy(EntryContentType $entry_content_type, EntryContentTypeAttribute $entry_content_type_attribute)
    {
        $entry_content_type_attribute->delete();
        return redirect()->route('dashboard.admin.entry_content_types');
    }
}
