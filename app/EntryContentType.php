<?php

namespace App;

class EntryContentType extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'css_classlist',
        'html_tag_open',
        'html_tag_close',
    ];
}
