<?php

namespace App\Http\Controllers;

use Auth;
use App\EntryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, $entry_type_id = null)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:entry_types,slug,' . $entry_type_id
        ]);
    }


    public function index(EntryType $entry_type)
    {
        return view('dashboard.author.entry_type.index', compact('entry_type'));
    }

    public function create()
    {
        return view('dashboard.admin.entry_type.create');
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $entry_type = new EntryType();
        $entry_type->name = $request->name;
        $entry_type->slug = str_slug($request->slug);
        $entry_type->save();

        return back();
    }

    public function edit(EntryType $entry_type)
    {
        return view('dashboard.admin.entry_type.edit', compact('entry_type'));
    }

    public function update(Request $request, EntryType $entry_type)
    {
        $this->validator($request->all(), $entry_type->id)->validate();

        $entry_type->name = $request->name;
        $entry_type->slug = str_slug($request->slug);
        $entry_type->save();

        return redirect()->route('entry_type.edit', $entry_type);
    }

    public function delete(EntryType $entry_type)
    {
        return view('dashboard.admin.entry_type.delete', compact('entry_type'));
    }

    public function destroy(EntryType $entry_type)
    {
        $entry_type->delete();
        return redirect()->route('dashboard.admin');
    }
}
