<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;  // Ensure this line is correct

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();  // This should now work
        return view('admin.orders.index', compact('orders'));
    }

    // Other methods
}
