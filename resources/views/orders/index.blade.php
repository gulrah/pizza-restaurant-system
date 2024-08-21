@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Your Orders</h1>

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
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td>{{ $order->id ?? 'N/A' }}</td>
                                <td>{{ $order->product_name ?? 'N/A' }}</td>
                                <td>{{ $order->quantity ?? 'N/A' }}</td>
                                <td>
                                    <span class="badge {{ $order->status == 'Completed' ? 'bg-success' : 'bg-warning' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td>
                                    {{-- <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                    <!-- Add other actions if necessary -->
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
</div>
@endsection
