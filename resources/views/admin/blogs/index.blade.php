@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Create New Post</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Views</th>
                <th scope="col">Date</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->id }}</td>
                    <td>
                        <a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a>
                    </td>
                    <td>
                        @if($blog->image)
                            <img src="{{ asset('storage/'.$blog->image) }}" alt="Blog Image" style="max-width: 150px; height: auto;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $blog->views ?? 0 }}</td>
                    <td>{{ $blog->created_at->format('d M, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" style="display:inline;">
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
@endsection
