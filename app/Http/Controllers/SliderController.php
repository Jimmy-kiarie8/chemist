<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SliderController extends Controller
{
    
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

    public function bestSellF()
    {
        return Product::take(4)->get();
    }

    public function bestSellA()
    {
        return Product::skip(4)->paginate(4);
    }

    public function newProF()
    {
        return Product::take(4)->get();
    }

    public function newProA()
    {
        return Product::skip(4)->get();
    }

    public function featuredF()
    {
        return Product::take(4)->get();
    }

    public function featuredA()
    {
        return Product::skip(4)->get();
    }
}
