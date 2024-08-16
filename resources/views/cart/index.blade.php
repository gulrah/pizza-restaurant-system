@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Your Cart</h2>
    @if (session('cart'))
        <div class="row">
            @foreach (session('cart') as $id => $details)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $details['name'] }}</h5>
                            <p class="card-text">${{ $details['price'] }}</p>
                            <p class="card-text">Quantity: {{ $details['quantity'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <a href="{{ route('cart.checkout') }}" class="btn btn-success">Checkout with PayPal</a>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
