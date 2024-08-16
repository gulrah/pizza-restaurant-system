@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Menu Items</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($menuItems as $item)
        <div class="col">
            <div class="card h-100">
                @if ($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">{{ $item->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-muted">${{ number_format($item->price, 2) }}</span>
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
