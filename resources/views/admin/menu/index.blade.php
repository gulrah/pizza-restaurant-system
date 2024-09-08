@extends('layouts.admin')

@section('content')

<div class="container-fluid p-4">
    <h1 class="mb-4 text-center">Menu Management</h1>

    <div class="mb-4 text-end">
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Add New Item</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead class="table-light">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discounted Price</th> <!-- New Column for Discounted Price -->
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menuItems as $item)
                <tr>
                    <td class="text-center">
                        @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                        <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->category->name ?? 'Uncategorized' }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>
                        <!-- Calculate and Display the Discounted Price -->
                        @if($item->discount_percentage > 0)
                            ${{ number_format($item->price - ($item->price * $item->discount_percentage / 100), 2) }}
                            <span class="text-muted">(-{{ $item->discount_percentage }}%)</span>
                        @else
                            <span class="text-muted">No Discount</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.menu.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.menu.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
