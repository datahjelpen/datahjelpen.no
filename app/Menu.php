<?php

namespace App;

class Menu extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'id',
        'name',
        'location'
    ];
}
