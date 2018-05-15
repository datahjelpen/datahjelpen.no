<?php

namespace App;

class Image extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'url',
        'size_width',
        'size_height',
        'size_name',
        'alt_tag'
    ];
}
