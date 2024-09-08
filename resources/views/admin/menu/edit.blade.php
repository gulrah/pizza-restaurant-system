@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Menu Item</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.menu.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $menuItem->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $menuItem->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $menuItem->price) }}" step="0.01" required>
        </div>

        <!-- New Discount Percentage Field -->
        <div class="mb-3">
            <label for="discount_percentage" class="form-label">Discount Percentage</label>
            <input type="number" name="discount_percentage" id="discount_percentage" class="form-control" value="{{ old('discount_percentage', $menuItem->discount_percentage) }}" min="0" max="100" step="0.01">
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id" class="form-select">
                <option value="" {{ old('category_id', $menuItem->category_id) ? '' : 'selected' }}>Uncategorized</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $menuItem->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($menuItem->image)
                <img src="{{ asset('storage/' . $menuItem->image) }}" alt="{{ $menuItem->name }}" class="mt-2" style="width:100px;">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Item</button>
        <a href="{{ route('admin.menu.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
