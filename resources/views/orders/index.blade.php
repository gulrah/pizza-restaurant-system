<!-- resources/views/orders/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Your Orders</h1>
        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    </div>
</div>

<!-- Table Container -->
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Order List</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Products</th>
                        <th>Quantity</th>
                        <th>Total Cost</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $order->id ?? 'N/A' }}</td>
                                <td>{{ $item->product_name ?? 'N/A' }}</td>
                                <td>{{ $item->quantity ?? 'N/A' }}</td>
                                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                <td>{{ $order->created_at->format('Y-m-d') ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $order->status == 'Completed' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No orders found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
