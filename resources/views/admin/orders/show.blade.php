@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Order Details</h1>

    <!-- Order Information -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Order #{{ $order->id }} Details</h5>
        </div>
        <div class="card-body">
            <!-- User Information -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6><i class="fas fa-user"></i> Customer Information</h6>
                    <ul class="list-unstyled">
                        <li><strong>Name:</strong> {{ $order->user->name }}</li>
                        <li><strong>Email:</strong> {{ $order->user->email }}</li>
                        <li><strong>Phone:</strong> {{ $order->user->phone ?? 'Not provided' }}</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6><i class="fas fa-map-marker-alt"></i> Shipping Information</h6>
                    <ul class="list-unstyled">
                        <li><strong>Address:</strong> {{ $order->address ?? 'Not provided' }}</li>
                        <li><strong>Special Requests:</strong> {{ $order->special_requests ?? 'None' }}</li>
                    </ul>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="row">
                <div class="col-md-6">
                    <h6><i class="fas fa-calendar-alt"></i> Order Summary</h6>
                    <ul class="list-unstyled">
                        <li><strong>Status:</strong> <span class="badge {{ $order->status == 'completed' ? 'bg-success' : ($order->status == 'on_way' ? 'bg-info' : 'bg-warning') }}">{{ ucfirst(str_replace('_', ' ', $order->status)) }}</span></li>
                        <li><strong>Order Date:</strong> {{ $order->created_at->format('F j, Y') }}</li>
                        <li><strong>Total Items:</strong> {{ $order->quantity }}</li>
                        <li><strong>Total Cost:</strong> ${{ number_format($order->total, 2) }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Ordered -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Products Ordered</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                        @php
                            $originalPrice = $item->menuItem->price;
                            $discountedPrice = $originalPrice - ($originalPrice * ($item->menuItem->discount_percentage / 100));
                            $totalPrice = $discountedPrice * $item->quantity;
                        @endphp
                        <tr>
                            <td>{{ $item->menuItem->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>
                                @if ($item->menuItem->discount_percentage > 0)
                                    <del>${{ number_format($originalPrice, 2) }}</del>
                                    <span class="text-danger">${{ number_format($discountedPrice, 2) }} <small class="text-muted">(-{{ $item->menuItem->discount_percentage }}%)</small></span>
                                @else
                                    ${{ number_format($originalPrice, 2) }}
                                @endif
                            </td>
                            <td>${{ number_format($totalPrice, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Grand Total:</td>
                        <td class="fw-bold">${{ number_format($order->total, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
