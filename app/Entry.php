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
}
