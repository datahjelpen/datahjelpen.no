<?php

namespace App;

class EntryContentTypeAttribute extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'html_attribute',
        'required',
        'entry_content_type_id',
    ];

    public function content_type()
    {
        return $this->belongsTo('App\EntryContentType', 'id', 'entry_content_type_id');
    }
}
