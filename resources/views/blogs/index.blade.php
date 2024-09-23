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

<!-- Grid Structure for Blog Items -->
<div class="container-fluid my-5 px-lg-5">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4"> <!-- Responsive columns for different screen sizes -->
        @foreach ($blogs as $blog)
        <div class="col">
            <div class="card h-100">
                @if($blog->image)
                <img src="{{ asset('storage/'.$blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 200px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <div style="height: 60px; overflow: hidden;"> <!-- Fixed height for title section -->
                        <h5 class="card-title">
                            <a href="{{ route('blogs.show', $blog) }}" class="text-decoration-none text-dark">{{ Str::limit($blog->title, 50) }}</a>
                        </h5>
                    </div>
                    <p class="card-text">{{ Str::limit($blog->content, 77) }}</p>
                    <a href="{{ route('blogs.show', $blog) }}" class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
