@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Order Details</h1>
    <div class="card">
        <div class="card-header">
            Order #{{ $order->id }}
        </div>
        <div class="card-body">
            <p><strong>User:</strong> {{ $order->user->name }}</p>
            <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
            <p><strong>Status:</strong> {{ $order->status }}</p>
            <p><strong>Ordered on:</strong> {{ $order->created_at->toFormattedDateString() }}</p>
            <!-- Add more details as necessary -->
        </div>
    </div>
</div>
@endsection
