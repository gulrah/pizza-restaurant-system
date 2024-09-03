@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    </div>
</div>
    @if (session('cart'))
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach (session('cart') as $id => $details)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}" class="card-img-top" style="height: 200px; object-fit: cover;">
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
@endsection