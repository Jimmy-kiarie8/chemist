<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // public function brand()
    // {
    //     return $this->belongsTo('App\Brand', 'brand_id');
    // }
    public function subCategory()
    {
        return $this->belongsTo('App\SupCategory', 'subcategory_id');
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    
    public function images()
    {
        return $this->hasMany('App\Productimg', 'product_id');
    }
}
