<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
{
    $orders = Order::where('user_id', auth()->id())->get();
    return view('orders.index', compact('orders'));
}

}
