<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    public $with = ['product'];
    public function product()
    {
        return $this->hasMany('App\Product', 'product_id');
    }

    public function user()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
