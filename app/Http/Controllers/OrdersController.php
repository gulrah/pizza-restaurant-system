<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with(['orderItems']) // Eager load order items
            ->orderBy('created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function storeOrderItem(Request $request)
    {
        // Validate the request
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_name' => 'required|string',
            'quantity' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        // Retrieve the data from the request
        $orderId = $request->input('order_id');
        $productName = $request->input('product_name');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        // Create a new order item
        $orderItem = new OrderItem();
        $orderItem->order_id = $orderId;
        $orderItem->product_name = $productName;
        $orderItem->quantity = $quantity;
        $orderItem->price = $price;
        $orderItem->save();

        return redirect()->route('orders.index')->with('success', 'Order item added successfully!');
    }
}
