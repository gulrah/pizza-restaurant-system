<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
{
    $orders = Order::all(); // or use appropriate query to get the orders
    return view('orders.index', compact('orders'));
}

}
