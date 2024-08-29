@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Menu</h1>

    <div class="mb-4">
        <a href="{{ route('admin.menu.create') }}" class="btn btn-primary">Add New Item</a>
    </div>

    <div class="row">
        @foreach ($menuItems as $item)
            <div class="col-md-4 mb-4">
                <h2>{{ $item->name }}</h2>
                <p>{{ $item->description }}</p>
                <p>Category: {{ $item->category->name ?? 'Uncategorized' }}</p>
                <p>${{ number_format($item->price, 2) }}</p>
                @if($item->image)
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width:100%;">
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
