<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $with = ['subCategories'];
    public function brands()
    {
        return $this->hasMany('App\Brand', 'category_id');
    }
    public function subCategories()
    {
        return $this->hasMany('App\SupCategory', 'category_id');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id');
    }
}
