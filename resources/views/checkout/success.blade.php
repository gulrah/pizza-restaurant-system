@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Payment Success</h1>
        <a href="/" class="btn btn-primary">Return Home</a>
    </div>
</div>

<div class="container mt-4">
    <h1>Payment Success</h1>
    <p>Your payment was successfully processed. Thank you for your order!</p>

    <h2>Order Summary</h2>
    <div class="mb-4">
        <h4>Customer Details</h4>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
    </div>

    <div class="mb-4">
        <h4>Order Details</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart as $id => $details)
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="text-right"><strong>Total</strong></td>
                    <td><strong>${{ array_sum(array_map(function ($item) {
                        return $item['price'] * $item['quantity'];
                    }, $cart)) }}</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="/" class="btn btn-primary">Return Home</a>
</div>
@endsection
