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
                        <th>Total Cost</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                {{$order->product_name }} x {{ $order->quantity }}<br>
                               
                            </td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            <td>
                                <span class="badge {{ $order->status == 'completed' ? 'bg-success' : 'bg-warning' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No orders found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
