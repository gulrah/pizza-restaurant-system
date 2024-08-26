@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    </div>
</div>

<!-- Search Form Start -->
<form method="GET" action="{{ route('menu.index') }}" class="mb-4" id="searchForm">
    <div class="input-group">
        <input type="text" id="menuSearch" name="search" class="form-control" placeholder="Search menu items..." value="{{ request()->get('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>
<!-- Search Form End -->

<!-- Menu Items Display -->
<div class="row row-cols-1 row-cols-md-3 g-4">
    @forelse ($menuItems as $item)
    <div class="col menu-item" data-name="{{ $item->name }}">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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

// Optional: If you want to handle form submission with Enter key while still supporting live search
document.getElementById('searchForm').addEventListener('submit', function(event) {
    const searchQuery = document.getElementById('menuSearch').value;
    if (searchQuery.trim() === '') {
        event.preventDefault(); // Prevent form submission if the search query is empty
    }
});
</script>
@endsection
