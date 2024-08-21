@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Menu Items</h2>

    <!-- Search Form Start -->
    <form method="GET" action="{{ route('menu.index') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search menu items..." value="{{ request()->get('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>
    <!-- Search Form End -->

    <!-- Menu Items Display -->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @forelse ($menuItems as $item)
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
        @empty
        <div class="col-12">
            <p class="text-center">No menu items found.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
