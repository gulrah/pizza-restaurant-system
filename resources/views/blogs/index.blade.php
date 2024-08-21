@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3">Blog Posts</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($blogs as $blog)
        <div class="col">
            <div class="card h-100">
                @if($blog->image)
                <img src="{{ asset('storage/'.$blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a></h5>
                    <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
