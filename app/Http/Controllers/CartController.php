<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;  // Import should be at the top, outside any class or method

class CartController extends Controller
{
    public function add(Request $request)
    {
        $item = MenuItem::findOrFail($request->item_id);
        $cart = session()->get('cart', []);

        if (!isset($cart[$item->id])) {
            $cart[$item->id] = [
                "name" => $item->name,
                "quantity" => 1,
                "price" => $item->price,
                "image" => $item->image
            ];
        } else {
            $cart[$item->id]['quantity']++;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function index()
    {
        $cart = session()->get('cart');
        return view('cart.index', compact('cart'));
    }

    public function checkout(Request $request)
{
    $cart = session('cart');
    $total = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $cart));

    // Create order
    $order = Order::create([
        'user_id' => auth()->id(),
        'total' => $total,
        'status' => 'completed'  // Example status
    ]);

    // Clear cart
    session()->forget('cart');

    // Redirect to a success page
    return redirect()->route('checkout.success')->with('order_id', $order->id);
}
}
