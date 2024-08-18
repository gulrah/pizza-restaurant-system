@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary">Create New Post</a>
    <ul>
        @foreach ($blogs as $blog)
            <li>
                {{ $blog->title }}
                <a href="{{ route('admin.blogs.edit', $blog) }}">Edit</a>
                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @if($blog->image)
                    <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" style="max-width: 200px; height: auto;">
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endsection
