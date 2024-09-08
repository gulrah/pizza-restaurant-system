<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderItem;

class CartController extends Controller
{
    // Add item to cart
    public function add(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        $item = MenuItem::findOrFail($request->item_id);
        $cart = session()->get('cart', []);

        // If item does not exist in cart, add it, otherwise increment quantity
        if (!isset($cart[$item->id])) {
            $cart[$item->id] = [
                "name" => $item->name,
                "quantity" => 1,
                "price" => $item->price,
                "image" => $item->image,
                "discount_percentage" => $item->discount_percentage ?? 0 // Ensure discount is stored
            ];
        } else {
            $cart[$item->id]['quantity']++;
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // Update item quantity in the cart
    public function update(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$request->item_id])) {
            $cart[$request->item_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully!');
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    // Remove item from the cart
    public function remove(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        $cart = session()->get('cart', []);
        if (isset($cart[$request->item_id])) {
            unset($cart[$request->item_id]);
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Item removed from cart!');
        }

        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    // Show payment form
    public function paymentForm()
    {
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        return view('cart.payment', compact('cart'));
    }

    // Process payment and create order
    public function processPayment(Request $request)
    {
        $request->validate([
            'card_number' => 'required|digits:16',
            'expiry_date' => 'required|date_format:m/y',
            'cvv' => 'required|digits:3',
            'address' => 'required|string|max:255',
            'special_requests' => 'nullable|string|max:1000', // Optional field
        ]);
    
        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }
    
        // Get user details
        $user = auth()->user();
    
        // Calculate total and apply discount
        $total = array_sum(array_map(function ($item) {
            $discountedPrice = $item['price'] - ($item['price'] * ($item['discount_percentage'] / 100));
            return $discountedPrice * $item['quantity'];
        }, $cart));
    
        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        $productNames = implode(', ', array_column($cart, 'name'));
    
        // Create a new order
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'completed',
            'quantity' => $totalQuantity,
            'product_name' => $productNames,
            'address' => $request->input('address'), // Store the delivery address
            'special_requests' => $request->input('special_requests'), // Store optional special requests
            'email' => $user->email
        ]);
    
        // Save each item in the order, including price
        foreach ($cart as $id => $details) {
            $price = $details['price']; // Retrieve price from cart
            $discountedPrice = $price - ($price * ($details['discount_percentage'] / 100)); // Apply discount if applicable
    
            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $discountedPrice, // Store the discounted price
            ]);
        }
    
        // Clear the cart
        session()->forget('cart');
    
        // Pass order and user details to the success page
        return view('checkout.success', [
            'order' => $order,
            'cart' => $cart,
            'user' => $user,
        ]);
    }

    // Display the cart
    public function index()
    {
        $cart = session()->get('cart');
        return view('cart.index', compact('cart'));
    }

    // Handle checkout and create order
    public function checkout(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login'); // Redirect to login if not authenticated
        }

        $cart = session('cart');
        if (!$cart) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Get user details
        $user = auth()->user();

        // Calculate total and apply discount
        $total = array_sum(array_map(function ($item) {
            $discountedPrice = $item['price'] - ($item['price'] * ($item['discount_percentage'] / 100));
            return $discountedPrice * $item['quantity'];
        }, $cart));

        $totalQuantity = array_sum(array_column($cart, 'quantity'));
        $productNames = implode(', ', array_column($cart, 'name'));

        // Create a new order
        $order = Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'status' => 'completed',
            'quantity' => $totalQuantity,
            'product_name' => $productNames,
            'address' => $request->input('address'), // Store the delivery address
            'email' => $user->email
        ]);

        // Save each item in the order, including price
        foreach ($cart as $id => $details) {
            $price = $details['price']; // Retrieve price from cart
            $discountedPrice = $price - ($price * ($details['discount_percentage'] / 100)); // Apply discount if applicable

            OrderItem::create([
                'order_id' => $order->id,
                'menu_item_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $discountedPrice, // Store the discounted price
            ]);
        }

        // Clear the cart
        session()->forget('cart');

        // Redirect to success page
        return view('checkout.success', [
            'order' => $order,
            'cart' => $cart,
            'user' => $user
        ]);
    }
}
