@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">{{ $blog->title }}</h1>
        <p class="text-white mb-4">Explore this blog post on {{ $blog->created_at->format('F j, Y') }}</p>
    </div>
</div>

<!-- Blog Content Section -->
<div class="container my-5">
    <div class="row g-5">
        <!-- Blog Image (Left) -->
        <div class="col-lg-5">
            @if($blog->image)
                <div class="blog-image">
                    <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded shadow-sm" style="width: 100%; height: auto;">
                </div>
            @endif
        </div>

        <!-- Blog Details and Content (Right) -->
        <div class="col-lg-7">
            <!-- Title and Meta Information -->
            <h1 class="mb-3">{{ $blog->title }}</h1>
            <div class="text-muted mb-4">
                <i class="fas fa-eye"></i> {{ $blog->views }} Views &bull; 
                <span>{{ $blog->created_at->format('F j, Y') }}</span>
            </div>

            <!-- Blog Content -->
            <div class="blog-content">
                {!! nl2br(e(Str::limit($blog->content, 600))) !!}
            </div>
        </div>
    </div>

    <!-- Full-width content after image -->
    <div class="row mt-5">
        <div class="col-12">
            <div class="blog-content">
                <!-- Remaining blog content that spans full width -->
                {!! nl2br(e(Str::after($blog->content, Str::limit($blog->content, 600)))) !!}
            </div>
        </div>
    </div>
</div>

@endsection
