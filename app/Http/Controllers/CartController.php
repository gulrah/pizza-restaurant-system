<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    public function add(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $item = MenuItem::findOrFail($request->item_id);
        $cart = session()->get('cart', []);

        if (!isset($cart[$item->id])) {
            $cart[$item->id] = [
                "name" => $item->name,
                "quantity" => 1,
                "price" => $item->price,
                "image" => $item->image,
                "discount_percentage" => $item->discount_percentage ?? 0 
            ];
        } else {
            $cart[$item->id]['quantity']++;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
{
    // Check if the user is authenticated
    if (!auth()->check()) {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'message' => 'Please log in to update the cart.'], 401);
        }
        return redirect()->route('login');
    }

    // Get the current cart session
    $cart = session()->get('cart', []);

    // Check if the item exists in the cart
    if (isset($cart[$request->item_id])) {
        // Update the quantity of the item in the cart
        $cart[$request->item_id]['quantity'] = $request->quantity;
        session()->put('cart', $cart);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Cart updated successfully!']);
        }

        // Redirect back with a success message for non-AJAX requests
        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    // If the item is not found in the cart
    if ($request->ajax()) {
        return response()->json(['success' => false, 'message' => 'Item not found in cart.'], 404);
    }

    return redirect()->back()->with('error', 'Item not found in cart.');
}


    public function remove(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login'); 
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$request->item_id])) {
            unset($cart[$request->item_id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Item removed from cart!');
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    public function paymentForm()
    {
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        return view('cart.payment', compact('cart'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'card_number' => 'required|digits:16',
            'expiry_date' => 'required|date_format:m/y',
            'cvv' => 'required|digits:3',
            'address' => 'required|string|max:255',
            'special_requests' => 'nullable|string|max:1000',
        ]);
    
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
    
        $user = auth()->user();
    
        $total = array_sum(array_map(function ($item) {
            $discountedPrice = $item['price'] - ($item['price'] * ($item['discount_percentage'] / 100));
            return $discountedPrice * $item['quantity'];
        }, $cart));
    
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        $productNames = implode(', ', array_column($cart, 'name'));
    
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'pending',
            'quantity' => $totalQuantity,
            'product_name' => $productNames,
            'address' => $request->input('address'),
            'special_requests' => $request->input('special_requests'),
            'email' => $user->email
        ]);
    
        foreach ($cart as $id => $details) {
            $price = $details['price'];
            $discountedPrice = $price - ($price * ($details['discount_percentage'] / 100));
    
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $discountedPrice,
            ]);
        }
    
        session()->forget('cart');
    
        return view('checkout.success', [
            'order' => $order,
            'cart' => $cart,
            'user' => $user,
        ]);
    }

    public function index()
    {
        $cart = session()->get('cart');
        return view('cart.index', compact('cart'));
    }

    public function checkout(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $user = auth()->user();

        $total = array_sum(array_map(function ($item) {
            $discountedPrice = $item['price'] - ($item['price'] * ($item['discount_percentage'] / 100));
            return $discountedPrice * $item['quantity'];
        }, $cart));

        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        $productNames = implode(', ', array_column($cart, 'name'));

        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'completed',
            'quantity' => $totalQuantity,
            'product_name' => $productNames,
            'address' => $request->input('address'),
            'email' => $user->email
        ]);

        foreach ($cart as $id => $details) {
            $price = $details['price'];
            $discountedPrice = $price - ($price * ($details['discount_percentage'] / 100));

            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $discountedPrice,
            ]);
        }

        session()->forget('cart');

        return view('checkout.success', [
            'order' => $order,
            'cart' => $cart,
            'user' => $user
        ]);
    }
}
