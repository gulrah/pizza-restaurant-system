<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orderCount = Order::count(); // Adjust as per your model and database structure
        $reservationCount = Reservation::count(); // Adjust as per your model and database structure

    return view('admin.dashboard', compact('orderCount', 'reservationCount'));
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
