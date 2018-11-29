<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->session()->get('cart'));
        return $products = Product::paginate(9);
        // return view('products.index', compact('products'));
    }
    public function proImg(Request $request, $id)
	{
		// return $request->all;
		$upload = Product::find($request->id);
		if ($request->hasFile('image')) {
			$imagename = time() . $request->image->getClientOriginalName();
			$request->image->storeAs('public/products', $imagename);
			// return response();
		}
		$image_name = '/storage/products/' . $imagename;
		$upload->image = $image_name;
		$upload->save();
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $product = new Product;
        $product->brand_id = $request->brandSelect['id'];
        $product->name = $request->form['name'];
        $product->price = $request->form['price'];
        $product->description = $request->form['description'];
        $product->quantity = $request->form['quantity'];
        $product->user_id = Auth::id();
        $product->save();
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $product = Product::find($id);
        $product->brand_id = $request->brandSelect['id'];
        $product->name = $request->form['name'];
        $product->price = $request->form['price'];
        $product->description = $request->form['description'];
        $product->quantity = $request->form['quantity'];
        // $product->user_id = Auth::id();
        $product->save();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function getsP()
    {
        return Product::first();
    }

    public function getTP()
    {
        // return Product::take(3)->get();
        return Product::paginate(3);
    }

    public function getTPN()
    {
        return Product::skip(3)->take(3)->get();
    }

    public function headerPro()
    {
        return Product::latest()->take(4)->get();
    }

    public function getProducts()
    {
        return Product::all();
    }
}
