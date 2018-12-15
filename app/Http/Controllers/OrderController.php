<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::latest()->take(500)->get();
        // dd(Order::first());
        $orders->transform(function ($order, $key) {
            $order->cart = unserialize($order->cart);
            // dd(unserialize($order->paypal['id']));
            // $order->paypal = unserialize($order->paypal);
            $user = User::find($order->buyer_id);
            $order->buyer_id = $user->name;
            return $order;
        });
        return $orders;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $order = $request->all();
        Notification::send($user, new OrderNotification($order));
        // $user->OrderNotification($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function pay()
    {
        $paypalO = Order::select('paypal')->first();
        return $paypalA = unserialize($paypalO->paypal);
        //  return $paypalA = collect(unserialize($paypal->paypal));
        // $paypalA->prepend('test','test');
        // return $paypalA;
        // $paypalA->transform(function ($paypal, $key) {
        //     return $test = 'test';
        // });
        $results = [];
        foreach ($paypalO as $paypal) {
            $Presults = unserialize($paypal->paypal);
            // return $results[] = $paypal->transactions;
                // return $Presults = unserialize($paypal->paypal);
            // return $Presults->payer;
            foreach ($Presults->transactions as $paypal1) {
                // return $paypal1;
                $results[] = $paypal1->description;
                $results[] = $paypal1->invoice_number;
            }
        }

        return $results;
    }
}
