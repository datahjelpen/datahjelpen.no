<?php

namespace App;

class EntryType extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function entries()
    {
        return $this->hasMany('App\Entry', 'id', 'entry_id');
    }
}
