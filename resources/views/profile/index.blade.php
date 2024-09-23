@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">My Account</h1>
        <p class="text-white mb-4">Manage your account, view your orders, and explore new features.</p>
    </div>
</div>

@if (isset($user))
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-header bg-primary text-white">
                        <h5>Account Details</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <th>Name:</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $user->phone ?? 'Not provided' }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $user->address ?? 'Not provided' }}</td>
                            </tr>
                            <tr>
                                <th>Member Since:</th>
                                <td>{{ $user->created_at->format('M d, Y') }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm mt-3">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-body text-center">
                        <i class="fas fa-box fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Your Orders</h5>
                        <p>Track, edit, and manage your recent orders.</p>
                        <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-sm">View Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar-alt fa-3x mb-3 text-primary"></i>
                        <h5 class="card-title">Reservations</h5>
                        <p>Manage your table reservations and bookings.</p>
                        <a href="{{ route('reservations.index') }}" class="btn btn-outline-primary btn-sm">View Reservations</a>
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
@endsection
