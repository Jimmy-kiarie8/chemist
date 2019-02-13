<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        return $products = Product::paginate(12);
        // return view('products.index', compact('products'));
    }

    public function proImg(Request $request, $id)
    {
        // $id = 50;
        $upload = Product::find($request->id);
        foreach ($variable as $key => $value) {
            if ($request->hasFile('image')) {
                // $imagename = time() . $request->image->getClientOriginalName();
                // $request->image->storeAs('public/test', $imagename);
                $img = $request->image;
                // $image_path = ;

                if (File::exists('storage/products/' . $upload->image)) {
                    $image_path = 'storage/products/' . $upload->image;

                    File::delete($image_path);
                    // return $image_path;
                }
                // $imagename =  Storage::disk('uploads')->put('products', $img);
                $imagename = Storage::disk('public')->put('products', $img);
            }
            $imgArr = explode('/', $imagename);
            $image_name = $imgArr[1];
            $upload->image = $image_name;
            // $upload->image = '/healthwise/products/'.$image_name;
            $upload->save();
        }
        return $upload;
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
        $product->subcategory_id = $request->subCatSelect['id'];
        $product->name = $request->form['name'];
        $product->price = $request->form['price'];
        $product->list_price = $request->form['list_price'];
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
        $product->subcategory_id = $request->subCatSelect['id'];
        $product->name = $request->form['name'];
        $product->price = $request->form['price'];
        $product->list_price = $request->form['list_price'];
        $product->description = $request->form['description'];
        $product->quantity = $request->form['quantity'];
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
        Product::find($product->id)->delete();
    }

    public function getProducts()
    {
        return Product::all();
    }

    public function featured()
    {
        return Product::where('featured', 1)->get();
    }

    public function bestSell()
    {
        return Product::where('best_sell', 1)->get();
    }

    public function newProduct()
    {
        return Product::where('new_product', 1)->get();
    }

    public function StatusItem(Request $request, $id)
    {
        // return $request->all();
        $status = $request->status;
        $data = $request->data;
        $product = Product::find($id);
        if ($status == 'featured') {
            // dd($status);
            $product->featured = !$data;
        } elseif ($status == 'best_sell') {
            // dd($status);
            $product->best_sell = !$data;
        } elseif ($status == 'new_product') {
            // dd($status);
            $product->new_product = !$data;
        }
        $product->save();
        return $product;
    }

    public function best_sellItem(Request $request, $id)
    {
        return $request->all();
        $product = Product::find($id);
    }

    public function new_prodtctItem(Request $request, $id)
    {
        return $request->all();
        $product = Product::find($id);
    }

    public function featuredItemFalse(Request $request, $id)
    {
        // return $request->all();
        $product = Product::find($id);
        $product->featured = !$request->id;
        $product->save();
        return $product;
    }

    public function best_sellItemFalse(Request $request, $id)
    {
        return $request->all();
        $product = Product::find($id);
    }

    public function new_productItemFalse(Request $request, $id)
    {
        return $request->all();
        $product = Product::find($id);
    }
}
