@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Blog</h1>
        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    </div>
</div>

<!-- Blog Grid Section -->
    <div class="row row-cols-1 row-cols-md-3 g-4"> <!-- Using the same grid structure from the cart -->
        @foreach ($blogs as $blog)
        <div class="col">
            <div class="card h-100">
                @if($blog->image)
                <img src="{{ asset('storage/'.$blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('blogs.show', $blog) }}" class="text-decoration-none text-dark">{{ $blog->title }}</a>
                    </h5>
                    <p class="card-text">{{ Str::limit($blog->content, 100) }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
