<?php

namespace App;

class MenuEntry extends \Illuminate\Database\Eloquent\Model
{
    protected $fillable = [
        'id',
        'entry_id',
        'menu_id',
        'parent_id',
        'order',
        'text',
        'icon',
        'title',
        'aria-label',
    ];
}
