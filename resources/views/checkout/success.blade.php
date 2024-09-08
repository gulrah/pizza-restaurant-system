@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Payment Success</h1>
        <p class="text-white mb-4">Thank you for your purchase! Your order has been successfully processed.</p>
        <a href="/" class="btn btn-light btn-lg me-3">Return Home</a>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-light btn-lg">View Orders</a>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg p-4">
                <div class="card-body">
                    <h2 class="text-center mb-4"><i class="fa fa-check-circle text-success"></i> Payment Success</h2>
                    <p class="text-center lead">Your payment was successfully processed. Thank you for your order!</p>

                    <!-- Display user information -->
                    <h5 class="mb-3">Customer Information</h5>
                    <ul>
                        <li><strong>Name:</strong> {{ $user->name }}</li>
                        <li><strong>Email:</strong> {{ $user->email }}</li>
                        <li><strong>Phone:</strong> {{ $user->phone }}</li> <!-- Displaying the phone number -->
                        <li><strong>Address:</strong> {{ $order->address }}</li>
                    </ul>

                    <!-- Order Summary -->
                    <h4 class="mb-3">Order Summary</h4>
                    <table class="table table-bordered mt-3">
                        <thead class="table-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $item)
                                @php
                                    // Calculate the discounted price
                                    $originalPrice = $item->menuItem->price;
                                    $discountedPrice = $originalPrice - ($originalPrice * ($item->menuItem->discount_percentage / 100));
                                @endphp
                                <tr>
                                    <td>{{ $item->menuItem->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        <p class="card-text">
                                            <strong>Price:</strong>
                                            @if ($item->menuItem->discount_percentage > 0)
                                                <!-- Show original price with strikethrough and discounted price in red -->
                                                <del>${{ number_format($originalPrice, 2) }}</del>
                                                <span class="text-danger">
                                                    ${{ number_format($discountedPrice, 2) }}
                                                    <small class="text-muted">(-{{ $item->menuItem->discount_percentage }}%)</small>
                                                </span>
                                            @else
                                                ${{ number_format($originalPrice, 2) }}
                                            @endif
                                        </p>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2" class="text-end fw-bold">Total</td>
                                <td class="fw-bold">${{ number_format($order->total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
