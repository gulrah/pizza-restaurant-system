@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">
    <h1 class="mb-4 text-center">Menu Management</h1>

    <div class="mb-4 text-end">
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Add New Item</a>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($menuItems as $item)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        <p class="card-text"><strong>Category:</strong> {{ $item->category->name ?? 'Uncategorized' }}</p>
                        <p class="card-text"><strong>Price:</strong> ${{ number_format($item->price, 2) }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('admin.menu.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.menu.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
