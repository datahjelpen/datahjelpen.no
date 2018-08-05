<?php

namespace App;

use App\EntryContentType;
use Carbon\Carbon;

Carbon::setLocale(config('app.locale'));

class Entry extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'css_id',
        'css_classlist',
        'entry_type_id',
        'entry_category_id',
        'author_id',
    ];

    public function entry_category()
    {
        return $this->belongsTo('App\EntryCategory', 'entry_category_id', 'id');
    }

    public function entry_type()
    {
        return $this->belongsTo('App\EntryType', 'entry_type_id', 'id');
    }

    public function entry_content()
    {
        return $this->hasMany('App\EntryContent');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function canonical_link()
    {
        return route('blog.show', $this->name);
    }

    public function date()
    {
        setlocale(LC_TIME, config('app.locale'));
        return $this->created_at->formatLocalized('%d. %h. %Y - %H:%M');
    }

    public function title()
    {
        $content_type = EntryContentType::where('name', 'blog-title')->firstOrFail();
        $result = $this->entry_content->where('entry_content_type_id', $content_type->id)->first();

        if ($result == null || $result->html_content == null) {
            return $this->name;
        }

        return $result->html_content;
    }

    public function title_overview()
    {
        $content_type = EntryContentType::where('name', 'blog-title-overview')->firstOrFail();
        $result = $this->entry_content->where('entry_content_type_id', $content_type->id)->first();

        if ($result == null || $result->html_content == null) {
            return $this->title();
        }

        return $result->html_content;
    }

    public function content()
    {
        $content_type = EntryContentType::where('name', 'blog-content')->firstOrFail();
        $result = $this->entry_content->where('entry_content_type_id', $content_type->id)->first();

        return $result->html_content;
    }

    public function excerpt()
    {
        $content_type = EntryContentType::where('name', 'blog-excerpt')->firstOrFail();
        $result = $this->entry_content->where('entry_content_type_id', $content_type->id)->first();

        if ($result == null || $result->html_content == null) {
            return substr(strip_tags($this->content()), 0, 350);
        }

        return $result->html_content;
    }

    public function image_header()
    {
        $content_type = EntryContentType::where('name', 'blog-image-header')->firstOrFail();
        $result = $this->entry_content->where('entry_content_type_id', $content_type->id)->first();

        if ($result == null || $result->html_content == null) {
            return asset(config('app.image'));
        }

        return $result->html_content;
    }

    public function image_overview()
    {
        $content_type = EntryContentType::where('name', 'blog-image-overview')->firstOrFail();
        $result = $this->entry_content->where('entry_content_type_id', $content_type->id)->first();

        if ($result == null || $result->html_content == null) {
            return $this->image_header();
        }

        return $result->html_content;
    }

    public function image_alt()
    {
        $content_type = EntryContentType::where('name', 'blog-image-alt')->firstOrFail();
        $result = $this->entry_content->where('entry_content_type_id', $content_type->id)->first();

        if ($result == null || $result->html_content == null) {
            return $this->title_overview();
        }

        return $result->html_content;
    }

}
