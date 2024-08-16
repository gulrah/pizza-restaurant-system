@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Menu</h1>
    <div class="row">
        @foreach ($menuItems as $item)
            <div class="col-md-4">
                <h2>{{ $item->name }}</h2>
                <p>{{ $item->description }}</p>
                <p>${{ number_format($item->price, 2) }}</p>
                @if($item->image)
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="width:100%;">
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
@extends('layouts.app')