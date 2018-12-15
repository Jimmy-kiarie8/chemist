<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // public $with['categories'];
    public function categories()
    {
        return $this->hasMany('App\Category', 'menu_id');
    }
}