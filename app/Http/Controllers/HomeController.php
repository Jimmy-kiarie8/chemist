<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chemist()
    {
        return view('welcome');
        // return redirect('/')->where('name', '[A-Za-z]+');
    }

    public function admin()
    {
        return view('admin.admin');
        // return redirect('/')->where('name', '[A-Za-z]+');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
