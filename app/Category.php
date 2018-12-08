<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function brands()
    {
        return $this->hasMany('App\Brand', 'category_id');
    }
    public function subCategories()
    {
        return $this->hasMany('App\SupCategory', 'category_id');
    }
}
