@extends('layouts.app')

@section('content')

<!-- Success Alert with Warning Color -->
@if (session('success'))
<div class="alert alert-warning alert-dismissible fade show text-center" role="alert" id="cartAlert" 
     style="position: fixed; top: 0; left: 0; right: 0; z-index: 1050; border-radius: 0; margin: 0; background-color: #f0ad4e; color: #fff;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<!-- Menu Header -->
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
        
        <!-- Search Form Start -->
        <form method="GET" action="{{ route('menu.index') }}" class="d-inline-block w-75" id="searchForm">
            <div class="input-group">
                <input type="text" id="menuSearch" name="search" class="form-control" placeholder="Search menu items..." value="{{ request()->get('search') }}">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
        <!-- Search Form End -->
    </div>
</div>

<!-- Menu Items Display -->
<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse ($menuItems as $item)
    <div class="col">
        <div class="card h-100">
            @if ($item->image)
            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $item->name }}</h5>
                <p class="card-text">{{ $item->description }}</p>
                
                <!-- Display Price and Discounted Price -->
                <div class="d-flex justify-content-between align-items-center">
                    @if ($item->discount_percentage > 0)
                        <span class="text-muted">
                            <del>${{ number_format($item->price, 2) }}</del> <!-- Original Price with a strikethrough -->
                        </span>
                        <span class="text-danger">
                            ${{ number_format($item->price - ($item->price * $item->discount_percentage / 100), 2) }} <!-- Discounted Price -->
                            <small class="text-muted">(-{{ $item->discount_percentage }}%)</small>
                        </span>
                    @else
                        <span class="text-muted">${{ number_format($item->price, 2) }}</span> <!-- Original Price (no discount) -->
                    @endif

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Automatically hide alert after 3 seconds
        const alert = document.getElementById('cartAlert');
        if (alert) {
            setTimeout(() => {
                alert.classList.add('fade');
                alert.classList.remove('show');
            }, 3000);
        }
    });
</script>

<script>
document.getElementById('menuSearch').addEventListener('input', function() {
    const searchQuery = this.value.toLowerCase();
    document.querySelectorAll('.menu-item').forEach(item => {
        const itemName = item.getAttribute('data-name').toLowerCase();
        const regex = new RegExp(searchQuery.split('').join('.*'), 'i');
        if (regex.test(itemName)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });
});

// Optional: Handle form submission with Enter key
document.getElementById('searchForm').addEventListener('submit', function(event) {
    const searchQuery = document.getElementById('menuSearch').value;
    if (searchQuery.trim() === '') {
        event.preventDefault(); // Prevent form submission if the search query is empty
    }
});
</script>
@endsection
