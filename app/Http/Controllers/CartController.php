<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Cart;

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
        $carts = Session::get('cart');
        $cartA = [];
        foreach ($carts->items as $itemsC) {
            $cartA[] = $itemsC;
        }
        return ($cartA);
        if (Session::has('cart')) {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            return $cart->getCart();
        } else {
            return;
        }

        // $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // $carts = new Cart($oldCart);
        // $carts = $carts->getCart($oldCart);
        // $newCart = [];
        // foreach ($carts as $cart) {
        //     return $cart['item']['price'];
        //     $qty = $cart['qty'];
        //     $ca = $new_cart['price'];
        //     // $newCart[] = array_prepend($cart['item'], $qty);
        // }
        // return $carts;
    }

    public function cartAdd(Request $request, $id)
    {
        // return $request->all();

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // dd($oldCart);
        $cart = new Cart($oldCart);
        $quantity = $request->quantity;
        $cart->cartAdd($product, $product->id, $quantity);
        $cartA = [];
        foreach ($cart->items as $itemsC) {
            $cartA[] = $itemsC;
        }
        $request->session()->put('cart', $cart);
        // dd($cartA);
        return $cartA;
    }
}
