@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>All Orders</h1>
    @if($orders->isEmpty())
        <p>No orders available.</p>
    @else
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Products</th>
                    <th>Total Cost</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>
                            {{ $order->product_name }} x {{ $order->quantity }}<br>
                    </td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                    <td>
                        <span class="badge {{ $order->status == 'completed' ? 'bg-success' : 'bg-warning' }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
