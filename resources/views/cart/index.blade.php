@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <p class="text-white mb-4">Your selected items are here. Proceed to checkout for payment.</p>
    </div>
</div>

@if (session('cart'))
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach (session('cart') as $id => $details)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $details['name'] }}</h5>

                            <!-- Edit Quantity -->
                            <form action="{{ route('cart.update') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $id }}">
                                <div class="input-group mb-3">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control" style="max-width: 100px;">
                                    <button type="submit" class="btn btn-outline-primary">Update</button>
                                </div>
                            </form>

                            <!-- Delete Item -->
                            <form action="{{ route('cart.remove') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $id }}">
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>

                            <!-- Display Price and Discount -->
                            @if (isset($details['discount_percentage']) && $details['discount_percentage'] > 0)
                                <p class="card-text">
                                    <strong>Price:</strong>
                                    <del>${{ number_format($details['price'], 2) }}</del> <!-- Original Price -->
                                    <span class="text-danger">
                                        ${{ number_format($details['price'] - ($details['price'] * $details['discount_percentage'] / 100), 2) }} <!-- Discounted Price -->
                                        <small class="text-muted">(-{{ $details['discount_percentage'] }}%)</small>
                                    </span>
                                </p>
                            @else
                                <p class="card-text"><strong>Price:</strong> ${{ number_format($details['price'], 2) }}</p>
                            @endif
                            <p class="card-text"><strong>Quantity:</strong> {{ $details['quantity'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('cart.payment') }}" class="btn btn-success btn-lg">Checkout</a>
            <a href="{{ route('menu.index') }}" class="btn btn-primary btn-lg">Continue Shopping</a>
        </div>
    </div>
@else
    <div class="container text-center">
        <p class="text-center">Your cart is empty.</p>
        <a href="{{ route('menu.index') }}" class="btn btn-primary btn-lg">Browse Menu</a>
    </div>
@endif
@endsection
