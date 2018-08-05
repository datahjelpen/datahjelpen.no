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

Carbon::setLocale(config('app.locale'));

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
        $entry_type = EntryType::where('slug', 'post')->firstOrFail();
        $entries = Entry::where('entry_type_id', $entry_type->id)->orderBy('created_at', 'DESC')->paginate(25);
        return view('blog.index', compact('entries'));
    }

    public function dashboard()
    {
        $entries = Entry::orderBy('created_at', 'DESC')->paginate(25);
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

            return redirect()->route('blog.show', $entry->name);
        } else if (is_string($entry)) {
            $entry = Entry::where('name', 'like', '%'.$entry.'%')
            ->orWhere('name', 'like', '%'.str_slug($entry).'%')
            ->orWhere('name', 'like', '%'.urldecode($entry).'%')
            ->orWhere('name', 'like', '%'.ucwords(str_replace('-', ' ', $entry)).'%')
            ->firstOrFail();
        }

        if ($entry->css_id == null) {
            $body_id = 'article-' . $entry->name;
        } else {
            $body_id = $entry->css_id;
        }

        $body_class_extra = 'article ' . $entry->css_classlist;

        $entry_type = EntryType::where('slug', 'post')->firstOrFail();
        if ($entry->entry_type->id == $entry_type->id) {
            return view('blog.entry.show', compact('entry', 'body_id', 'body_class_extra'));
        }

        abort(404);
    }

    public function create()
    {
        $current_user = Auth::user();
        $entry_types = EntryType::whereIn('slug', ['post', 'draft'])->get();
        $body_class_extra = 'article';

        return view('blog.entry.create', compact('entry_types', 'body_class_extra', 'current_user'));
    }

    protected function validator(array $data, $entry_id = null)
    {
        return Validator::make($data, [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'entry_type' => 'required|integer',
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();

        $entry_type = EntryType::where('id', $request->entry_type)->firstOrFail();
        $entry_category = EntryCategory::where('slug', 'generelt')->firstOrFail();

        $ect_blog_title = EntryContentType::where('name', 'blog-title')->firstOrFail();
        $ect_blog_title_overview = EntryContentType::where('name', 'blog-title-overview')->firstOrFail();
        $ect_blog_content = EntryContentType::where('name', 'blog-content')->firstOrFail();
        $ect_blog_excerpt = EntryContentType::where('name', 'blog-excerpt')->firstOrFail();
        $ect_blog_image_header = EntryContentType::where('name', 'blog-image-header')->firstOrFail();
        $ect_blog_image_overview = EntryContentType::where('name', 'blog-image-overview')->firstOrFail();
        $ect_blog_image_alt = EntryContentType::where('name', 'blog-image-alt')->firstOrFail();

        $slug = $request->slug;
        if ($slug == null) {
            $slug =  strip_tags($request->title);
        }

        $entry = new Entry;
        $entry->name = str_slug($slug);
        $entry->author_id = $user->id;
        $entry->entry_type_id = $entry_type->id;
        $entry->entry_category_id = $entry_category->id;
        $entry->css_id = $request->css_id;
        $entry->css_classlist = $request->css_classlist;

        if ($entry->save()) {
            $error = false;

            // Title
            $entry_content = new EntryContent;
            $entry_content->entry_content_type_id = $ect_blog_title->id;
            $entry_content->order = 0;
            $entry_content->html_content = strip_tags($request->title);
            $entry_content->entry_id = $entry->id;
            if (!$entry_content->save()) $error = true;

            // Title in overview
            $entry_content = new EntryContent;
            $entry_content->entry_content_type_id = $ect_blog_title_overview->id;
            $entry_content->order = 0;
            $entry_content->html_content = strip_tags($request->title_overview);
            $entry_content->entry_id = $entry->id;
            if (!$entry_content->save()) $error = true;

            // Content in post
            $entry_content = new EntryContent;
            $entry_content->entry_content_type_id = $ect_blog_content->id;
            $entry_content->order = 0;
            $entry_content->html_content = $request->content;
            $entry_content->entry_id = $entry->id;
            if (!$entry_content->save()) $error = true;

            // Content in overview
            $entry_content = new EntryContent;
            $entry_content->entry_content_type_id = $ect_blog_excerpt->id;
            $entry_content->order = 0;
            $entry_content->html_content = strip_tags($request->excerpt);
            $entry_content->entry_id = $entry->id;
            if (!$entry_content->save()) $error = true;

            // Image in post
            $entry_content = new EntryContent;
            $entry_content->entry_content_type_id = $ect_blog_image_header->id;
            $entry_content->order = 0;
            $entry_content->html_content = strip_tags($request->image_header);
            $entry_content->entry_id = $entry->id;
            if (!$entry_content->save()) $error = true;

            // Image in overview
            $entry_content = new EntryContent;
            $entry_content->entry_content_type_id = $ect_blog_image_overview->id;
            $entry_content->order = 0;
            $entry_content->html_content = strip_tags($request->image_overview);
            $entry_content->entry_id = $entry->id;
            if (!$entry_content->save()) $error = true;

            // Image alt text
            $entry_content = new EntryContent;
            $entry_content->entry_content_type_id = $ect_blog_image_alt->id;
            $entry_content->order = 0;
            $entry_content->html_content = strip_tags($request->image_alt);
            $entry_content->entry_id = $entry->id;
            if (!$entry_content->save()) $error = true;

            if (!$error) {
                Session::flash('success', 'Din post ble lagret.');
                return redirect()->route('blog.dashboard');
            }
        }

        Session::flash('error', 'Noe gikk galt, vi kunne ikke lagre din post.');
        return redirect()->back();
    }

    public function edit(Entry $entry)
    {
        $current_user = Auth::user();
        $entry_types = EntryType::whereIn('slug', ['post', 'draft'])->get();

        $ect_blog_excerpt = EntryContentType::where('name', 'blog-excerpt')->firstOrFail();
        $excerpt = $entry->entry_content->where('entry_content_type_id', $ect_blog_excerpt->id)->first();

        if ($excerpt == null) {
            $entry->excerptIsAuto = true;
        } else if ($excerpt->html_content != null) {
            $entry->excerptIsAuto = false;
        } else {
            $entry->excerptIsAuto = true;
        }

        if ($entry->css_id == null) {
            $body_id = 'article-' . $entry->name;
        } else {
            $body_id = $entry->css_id;
        }

        $body_class_extra = 'article ' . $entry->css_classlist;

        return view('blog.entry.create', compact('entry', 'entry_types', 'body_id', 'body_class_extra', 'current_user'));
    }

    public function update(Request $request, Entry $entry)
    {
        $this->validator($request->all())->validate();
        $user = Auth::user();

        $ect_blog_title = EntryContentType::where('name', 'blog-title')->firstOrFail();
        $ect_blog_title_overview = EntryContentType::where('name', 'blog-title-overview')->firstOrFail();
        $ect_blog_content = EntryContentType::where('name', 'blog-content')->firstOrFail();
        $ect_blog_excerpt = EntryContentType::where('name', 'blog-excerpt')->firstOrFail();
        $ect_blog_image_header = EntryContentType::where('name', 'blog-image-header')->firstOrFail();
        $ect_blog_image_overview = EntryContentType::where('name', 'blog-image-overview')->firstOrFail();
        $ect_blog_image_alt = EntryContentType::where('name', 'blog-image-alt')->firstOrFail();


        $slug = $request->slug;
        if ($slug == null) {
            $slug =  strip_tags($request->title);
        }

        $entry->name = str_slug($slug);
        $entry->author_id = $user->id;
        $entry->css_id = $request->css_id;
        $entry->css_classlist = $request->css_classlist;

        if ($entry->save()) {
            $error = false;

            // Title
            $entry_content = $entry->entry_content->where('entry_content_type_id', $ect_blog_title->id)->first();
            $entry_content->html_content = strip_tags($request->title);
            if (!$entry_content->save()) $error = true;

            // Title in overview
            $entry_content = $entry->entry_content->where('entry_content_type_id', $ect_blog_title_overview->id)->first();
            $entry_content->html_content = strip_tags($request->title_overview);
            if (!$entry_content->save()) $error = true;

            // Content in post
            $entry_content = $entry->entry_content->where('entry_content_type_id', $ect_blog_content->id)->first();
            $entry_content->html_content = $request->content;
            if (!$entry_content->save()) $error = true;

            // Content in overview
            $entry_content = $entry->entry_content->where('entry_content_type_id', $ect_blog_excerpt->id)->first();
            $entry_content->html_content = strip_tags($request->excerpt);
            if (!$entry_content->save()) $error = true;

            // Image in post
            $entry_content = $entry->entry_content->where('entry_content_type_id', $ect_blog_image_header->id)->first();
            $entry_content->html_content = strip_tags($request->image_header);
            if (!$entry_content->save()) $error = true;

            // Image in overview
            $entry_content = $entry->entry_content->where('entry_content_type_id', $ect_blog_image_overview->id)->first();
            $entry_content->html_content = strip_tags($request->image_overview);
            if (!$entry_content->save()) $error = true;

            // Image alt text
            $entry_content = $entry->entry_content->where('entry_content_type_id', $ect_blog_image_alt->id)->first();
            $entry_content->html_content = strip_tags($request->image_alt);
            if (!$entry_content->save()) $error = true;

            if (!$error) {
                Session::flash('success', 'Din post ble lagret.');
                return redirect()->route('blog.dashboard');
            }
        }

        Session::flash('error', 'Noe gikk galt, vi kunne ikke lagre din post.');
        return redirect()->back();
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
