<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FilterController extends Controller
{
    public function filterItem(Request $request)
    {
        // return $request->all();
        return Product::whereIn('brand_id', $request->all())->paginate(9);
    }
}
