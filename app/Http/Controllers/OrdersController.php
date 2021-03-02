<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function index()
    {
        $orders = auth()->user()->orders()->with('products')->latest()->get();

        return view('orders.index', compact('orders'));
    }


    public function show(Order $order)
    {
        if (auth()->id() !== $order->user_id){
            return abort('401');
        }

        $products = $order->products;
        return view('orders.show', compact('order', 'products'));
    }

}
