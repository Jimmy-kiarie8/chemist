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

    public function filterItems(Request $request)
    {
        // return $request->all();
        if ($request->brand != null) {
            return Product::where('brand_id', $request->brand)->paginate(9);
        } elseif ($request->sub_cat) {
            return Product::where('subcategory_id', $request->sub_cat)->paginate(9);
        } elseif ($request->price) {
            return Product::whereBetween('price', $request->price)->paginate(9);
        } else {
            return 'noop';
        }
    }


    public function FilterShop(Request $request)
    {
        // return $request->all();
        $price = $request->price['state'];
        $id = $request->item;
        if (!empty($request->itemSelect['abbr'])) {
            $item = $request->itemSelect['abbr'];
        } else {
            $item = $request->itemSelect['state'];
        }

        // $item = $request->itemSelect['abbr'];
        // return Product::where('category_id', $request->id)->paginate(12);
        if (empty($id) && $price == 'All' && $item != 'All') {
            return Product::where($item, 1)->paginate(12);
        } elseif (empty($id) && $price != 'All' && $item == 'All') {
            $price_a = explode('-', $price);
            return Product::whereBetween('price', $price_a)->paginate(12);
        } elseif (!empty($id) && $price == 'All' && $item == 'All') {
            return Product::where('category_id', $id)->paginate(12);
        } elseif (empty($id) && $price != 'All' && $item != 'All') {
            $price_a = explode('-', $price);
            return Product::whereBetween('price', $price_a)->where($item, 1)->paginate(12);
        } elseif (!empty($id) && $price == 'All' && $item != 'All') {
            return Product::where($item, 1)->where('category_id', $id)->paginate(12);
        } elseif (!empty($id) && $price != 'All' && $item == 'All') {
            $price_a = explode('-', $price);
            return Product::whereBetween('price', $price_a)->where('category_id', $id)->paginate(12);
        } elseif (!empty($id) && $price != 'All' && $item != 'All') {
            $price_a = explode('-', $price);
            return Product::where($item, 1)->whereBetween('price', $price_a)->where('category_id', $id)->paginate(12);
        } else {
            return Product::paginate(12);
        }

    }

}
