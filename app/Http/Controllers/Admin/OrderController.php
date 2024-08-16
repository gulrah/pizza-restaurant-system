<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)  // Adding the show method
    {
        $order = Order::with('user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
    public function userOrders()
    {
        $orders = Order::where('user_id', auth()->id())->with('user')->get();
        return view('orders.index', compact('orders')); // Update the path here
    }

    // Other controller methods...
}
