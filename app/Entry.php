<?php

namespace App;

class Entry extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'id',
        'type',
        'category',
        'content',
        'author',
    ];
}
