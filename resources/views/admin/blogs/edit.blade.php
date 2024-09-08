@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Blog Post</h1>

    <!-- Display Blog Image if it exists -->
    @if($blog->image)
        <div class="mb-3">
            <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" class="img-fluid" style="max-width: 200px;">
        </div>
    @endif

    <!-- Blog Edit Form -->
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Title Input -->
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
        </div>

        <!-- Content Textarea -->
        <div class="form-group mb-3">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10" required>{{ $blog->content }}</textarea>
        </div>

        <!-- Image Upload Input -->
        <div class="form-group mb-4">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Blog Post</button>
    </form>
</div>
@endsection
