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
use App\EntryCategory;
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

    public function show($entry)
    {
        if (is_numeric($entry)) {
            $entry = Entry::findOrFail($entry);

            return redirect()->route('blog.show', str_slug($entry->name));
        } else if (is_string($entry)) {
            $entry = Entry::where('name', 'like', '%'.str_slug($entry).'%')
            ->orWhere('name', 'like', '%'.$entry.'%')
            ->orWhere('name', 'like', '%'.urldecode($entry).'%')
            ->orWhere('name', 'like', '%'.ucwords(str_replace('-', ' ', $entry)).'%')
            ->firstOrFail();
        }

        $entry_type = EntryType::where('slug', 'post')->firstOrFail();
        if ($entry->entry_type->id = $entry_type->id) {
            $entry_content = $entry->entry_content->first();


            if ($entry_content != null) {
                $entry->content = $entry_content->html_content;

        return view('blog.entry.show', compact('entry'));
    }
        }

        abort(404);
    }

    public function create()
    {
        $entry_types = EntryType::whereIn('slug', ['post', 'draft'])->get();
        $entry_categories = EntryCategory::all();

        return view('blog.entry.create', compact('entry_types', 'entry_categories'));
    }

    protected function validator(array $data, $entry_id = null)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'entry_category' => 'required|integer',
            'entry_type' => 'required|integer',
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();

        $entry_type = EntryType::where('id', $request->entry_type)->firstOrFail();
        $entry_category = EntryCategory::where('id', $request->entry_category)->firstOrFail();
        $entry_content_type = EntryContentType::findOrFail(1);

        $entry = new Entry;
        $entry->name = strip_tags($request->title);
        $entry->author_id = $user->id;
        $entry->entry_type_id = $entry_type->id;
        $entry->entry_category_id = $entry_category->id;

        if ($entry->save()) {
            $entry_content = new EntryContent;
            $entry_content->order = 0;
            $entry_content->html_content = $request->content;
            $entry_content->entry_content_type_id = $entry_content_type->id;
            $entry_content->entry_id = $entry->id;

            if ($entry_content->save()) {
                Session::flash('success', 'Din post ble lagret.');
                return redirect()->route('blog.dashboard');
            }
        }

        Session::flash('error', 'Noe gikk galt, vi kunne ikke lagre din post.');
        return redirect()->route('blog.dashboard');
    }

    public function edit(Entry $entry)
    {
        $entry_types = EntryType::whereIn('slug', ['post', 'draft'])->get();
        $entry_categories = EntryCategory::all();

        return view('blog.entry.create', compact('entry', 'entry_types', 'entry_categories'));
    }

    public function update(Request $request, Entry $entry)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();

        $entry_type = EntryType::where('id', $request->entry_type)->firstOrFail();
        $entry_category = EntryCategory::where('id', $request->entry_category)->firstOrFail();
        $entry_content_type = EntryContentType::findOrFail(1);

        $entry->name = strip_tags($request->title);
        $entry->author_id = $user->id;
        $entry->entry_type_id = $entry_type->id;
        $entry->entry_category_id = $entry_category->id;

        if ($entry->save()) {
            $entry_content = $entry->entry_content->first();
            $entry_content->html_content = $request->content;

            if ($entry_content->save()) {
                Session::flash('success', 'Din post ble lagret.');
                return redirect()->route('blog.edit', $entry);
            }
        }

        Session::flash('error', 'Noe gikk galt, vi kunne ikke lagre din post.');
        return redirect()->route('blog.edit', $entry);
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
