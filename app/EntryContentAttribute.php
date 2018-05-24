<?php

namespace App;

class EntryContentAttribute extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'value',
    ];

    public function entry_content()
    {
        return $this->belongsTo('App\EntryContent', 'id', 'entry_content_id');
    }

    public function type_attribute()
    {
        return $this->belongsTo('App\EntryContentTypeAttribute', 'id', 'entry_content_type_attribute_id');
    }

    public function link()
    {
        return $this->hasOne('App\Entry', 'id', 'entry_id');
    }

    public function image()
    {
        return $this->hasOne('App\Image', 'id', 'image_id');
    }
}
