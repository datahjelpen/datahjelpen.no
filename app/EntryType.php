<?php

namespace App;

class EntryType extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'slug',
    ];
}
