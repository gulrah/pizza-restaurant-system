@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">My Account</h1>
        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    </div>
</div>
    @if (isset($user))
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">{{ $user->name }}'s Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>Email:</strong>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <strong>Joined:</strong>
                            </div>
                            <div class="col-md-8">
                                <p>{{ $user->created_at->format('F j, Y') }}</p>
                            </div>
                        </div>
                        <div class="text-end mb-3">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                        </div>
                        <!-- Links to Orders and Reservations -->
                        <div class="text-end">
                            <a href="{{ route('orders.index') }}" class="btn btn-primary">View Orders</a>
                            <a href="{{ route('reservations.index') }}" class="btn btn-secondary">View Reservations</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning text-center" role="alert">
            User information could not be retrieved.
        </div>
    @endif
</div>
@endsection
