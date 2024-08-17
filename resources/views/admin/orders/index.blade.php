@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>My Orders</h1>
    @if($orders->isEmpty())
        <p>You have no orders.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Ordered On</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>${{ number_format($order->total, 2) }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
