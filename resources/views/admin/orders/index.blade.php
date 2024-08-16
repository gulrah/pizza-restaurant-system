@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Orders</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>${{ number_format($order->total, 2) }}</td>
                <td>{{ $order->status }}</td>
                <td><a href="{{ route('admin.orders.show', $order->id) }}">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
