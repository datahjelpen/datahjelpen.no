<?php

namespace App;

class EntryContentType extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'icon',
        'css_classlist',
        'html_tag_open',
        'html_tag_close',
    ];
}
