<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request; // Make sure this is correctly imported

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }
    public function userOrders()
    {
        $orders = Order::where('user_id', auth()->id())->with('user')->get();
        return view('orders.index', compact('orders'));
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:pending,admin_accept,on_way,completed',
    ]);

    $order = Order::findOrFail($id);
    $order->status = $request->input('status');
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}

}
