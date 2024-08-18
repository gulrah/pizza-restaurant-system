@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Blog Post</h1>
    @if($blog->image)
    <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image">
@endif
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="content" name="content" rows="10" required>{{ $blog->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>        
        @if($blog->image)
    <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image">
@endif
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
