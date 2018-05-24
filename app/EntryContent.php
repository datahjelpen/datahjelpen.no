<?php

namespace App;

class EntryContent extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'order',
        'css_id',
        'css_classlist',
        'html_content',
    ];

    public function entry()
    {
        return $this->belongsTo('App\Entry', 'id', 'entry_id');
    }

    public function content_type()
    {
        return $this->hasOne('App\EntryContentType', 'id', 'entry_content_type_id');
    }

    public function background_image()
    {
        return $this->hasOne('App\Image', 'id', 'background_image_id');
    }

    public function parent()
    {
        return $this->hasOne('App\EntryContent', 'parent_id', 'id');
    }

    public function child()
    {
        return $this->hasMany('App\EntryContent', 'id', 'parent_id');
    }




    public function attributes()
    {
        return $this->hasMeny('App\EntryContentAttribute', 'id', 'entry_content_id');
    }
}
