@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog Posts</h1>
    <ul>
        @foreach ($blogs as $blog)
            <li>
                <h2><a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }}</a></h2>
                @if($blog->image)
                    <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" style="width:100px; height:auto;">
                @endif
                <p>{{ Str::limit($blog->content, 100) }} <a href="{{ route('blogs.show', $blog) }}">Read more...</a></p>
            </li>
        @endforeach
    </ul>
</div>
@endsection
