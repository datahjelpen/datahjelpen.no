<?php

namespace App;

class Entry extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'type',
        'category',
        'content',
        'author',
    ];

    public function entry_type()
    {
        return $this->belongsTo('App\EntryType', 'id', 'entry_type_id');
    }

    public function entry_type()
    {
        return $this->belongsTo('App\EntryCategory', 'id', 'entry_category_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'id', 'author_id');
    }
}
