@extends('layouts.app')

@section('content')
    </div><div class="container-xxl py-5 bg-dark hero-header mb-5" 
    style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
           background-size: cover; background-position: center; height: 50vh;">
   <div class="container my-5 py-5 text-center">
       <h1 class="display-3 text-white mb-3 animated slideInDown">Welcome to Your Dashboard</h1>
       <p class="text-white mb-4">Manage your account, view your orders, and explore new features.</p>
   </div>
</div>

    <div class="row">
        <!-- Orders Section -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow rounded-lg">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Your Orders</h5>
                    <p>Track, edit,lwenlvkn and manage your recent orders.</p>
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-sm">View Orders</a>
                </div>
            </div>
        </div>
        <!-- Profile Section -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card border-0 shadow rounded-lg">
                <div class="card-body text-center">
                    <i class="fas fa-user fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Profile Settings</h5>
                    <p>Update your personal information and password.</p>
                    <a href="{{ route('profile.index') }}" class="btn btn-outline-primary btn-sm">View Profile</a>
                </div>
            </div>
        </div>
        <!-- Reservations Section -->
        <div class="col-lg-4 col-md-12 mb-4">
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
@endsection
