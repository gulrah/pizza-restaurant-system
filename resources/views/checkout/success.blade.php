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

<div class="container my-5">
    <div class="card shadow-sm p-4">
        <h3 class="text-center mb-4">Thank you. Your order has been received.</h3>
        <ul class="list-unstyled">
            <li><strong>Order number:</strong> {{ $order->id }}</li>
            <li><strong>Date:</strong> {{ $order->created_at->format('F j, Y') }}</li>
            <li><strong>Total:</strong> ${{ number_format($order->total, 2) }}</li>
            <li><strong>Email:</strong> {{ $order->email }}</li>
        </ul>
        <h4 class="mt-5">Order Details</h4>
        <table class="table table-bordered mt-3">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="row">Total:</th>
                    <td colspan="2">${{ number_format($order->total, 2) }}</td>
                </tr>
            </tfoot>
        </table>

        <h4 class="mt-5">Billing Address</h4>
        <!-- Include billing address details here -->
    </div>
</div>
@endsection
