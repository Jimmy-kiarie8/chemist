<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // dd($oldCart);
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $cartA = [];
        foreach ($cart->items as $itemsC) {
            $cartA[] = $itemsC;
        }
        $request->session()->put('cart', $cart);
        // dd($cartA);
        return $cartA;
    }

    public function subToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // dd($oldCart);
        $cart = new Cart($oldCart);
        $cart->subtruct($product, $product->id);
        $cartA = [];
        foreach ($cart->items as $itemsC) {
            $cartA[] = $itemsC;
        }
        $request->session()->put('cart', $cart);
        return $cartA;
    }

    public function getCart()
    {
        // dd(Session::get('cart'));
        // $carts = Session::get('cart');
        // $cartA = [];
        // foreach ($carts->items as $itemsC) {
        //     $cartA[] = $itemsC;
        // }
        // return ($cartA);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        return $cart->getCart();

    }
}
