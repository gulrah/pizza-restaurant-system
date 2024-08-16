<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;

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
    public function checkout()
{
    // Simulate a payment processing
    session()->forget('cart'); // Optionally clear the cart
    return redirect()->route('checkout.success')->with('success', 'Payment successful! Your order is being processed.');
}

}
