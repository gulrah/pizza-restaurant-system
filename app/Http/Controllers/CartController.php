<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;

class CartController extends Controller
{
    public function add(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('guest.page'); // Redirect to guest page if not logged in
        }

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
        if (!auth()->check()) {
            return redirect()->route('guest.page'); // Redirect to guest page if not logged in
        }

        $cart = session('cart');
        
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        $productNames = implode(', ', array_column($cart, 'name'));

        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'completed',
            'quantity' => $totalQuantity,
            'product_name' => $productNames,
            // 'address' => auth()->user()->address,
            // 'email' => auth()->user()->email,
        ]);

        session()->forget('cart');

        return view('checkout.success', [
            'order' => $order,
            'cart' => $cart
        ]);
    }
}
