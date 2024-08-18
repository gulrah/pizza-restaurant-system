@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $blog->title }}</h1>
    @if($blog->image)
        <img src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}" style="max-width: 600px; height: auto;">
    @endif
    <div>
        {!! nl2br(e($blog->content)) !!}
    </div>
</div>
@endsection
