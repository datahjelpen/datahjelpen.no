<?php

namespace App;

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
}
