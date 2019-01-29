<?php

namespace App\Http\Controllers;

use App\Wish;
use App\Product;
use Illuminate\Http\Request;
use App\WishList;
use Illuminate\Support\Facades\Session;

class WishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $product_id = Wish::all();
        // return Product::whereIn('id', $product_id)->get();
        // return (Session::get('wish'));
        $wishs_ar = Session::get('wish');
        
        return $wishs = array_flatten($wishs_ar);
        
        // $wishA = [];
        // foreach ($wishs as $itemsC) {
        //     $wishA[] = $itemsC;
        // }
        // return ($wishA);
        // if (Session::has('wish')) {
        //     $oldWish = Session::has('wish') ? Session::get('wish') : null;
        //     $wish = new Wish($oldWish);
        //     return $wish->getWish();
        // } else {
        //     return;
        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function show(Wish $wish)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // $request->session()->forget('wish');
        // return $request->all();
        $product = Product::find($id);
        $oldWish = Session::has('wish') ? Session::get('wish') : null;
        $id_array = [];
        if (!empty($oldWish[$id])) {
            foreach ($oldWish[$id] as $wish) {
                $id_array[] = $wish->id;
            }
            if (in_array($id, $id_array)) {
                // unset($oldWish[$id]);
                Session::forget('wish.' . $id, $id);
            } else {
                $request->session()->push('wish' . $id, $product);
            }

        } else {
            $request->session()->push('wish.' . $id, $product);
        }
        
        return Session::get('wish');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wish  $wish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wish $wish)
    {
        //
    }
}
