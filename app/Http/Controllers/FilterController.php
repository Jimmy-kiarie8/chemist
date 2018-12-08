<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FilterController extends Controller
{
    public function filterItem(Request $request)
    {
        // return $request->all();
        return Product::whereIn('subcategory_id', $request->all())->paginate(9);
    }
    public function filterProduct(Request $request, $id)
    {
        // return $request->all();
        return Product::where('subcategory_id', $id)->paginate(9);
    }
}
