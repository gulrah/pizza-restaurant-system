@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4">Welcome to Your Dashboard</h1>
            <p class="lead">Manage your account, view your orders, and explore new features.</p>
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
                    <a href="{{ route('profile.index') }}" class="btn btn-outline-primary btn-sm">Edit Profile</a>
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

    <!-- Carousel Section -->
    <div class="row mt-5">
        <div class="col-lg-12">
            <div id="userDashboardCarousel" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="card border-0 shadow rounded-lg">
                        <img src="img/promotion1.jpg" class="card-img-top" alt="Promotion 1">
                        <div class="card-body text-center">
                            <h5 class="card-title">Special Offer</h5>
                            <p class="card-text">Get 20% off on your next order!</p>
                            {{-- <a href="{{ route('promo.details') }}" class="btn btn-primary btn-sm">Learn More</a> --}}
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 shadow rounded-lg">
                        <img src="img/promotion2.jpg" class="card-img-top" alt="Promotion 2">
                        <div class="card-body text-center">
                            <h5 class="card-title">New Menu Items</h5>
                            <p class="card-text">Explore our latest additions to the menu.</p>
                            <a href="{{ route('menu.index') }}" class="btn btn-primary btn-sm">Explore Menu</a>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card border-0 shadow rounded-lg">
                        <img src="img/promotion3.jpg" class="card-img-top" alt="Promotion 3">
                        <div class="card-body text-center">
                            <h5 class="card-title">Loyalty Program</h5>
                            <p class="card-text">Earn points and rewards with every purchase.</p>
                            {{-- <a href="{{ route('loyalty.index') }}" class="btn btn-primary btn-sm">Join Now</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $("#userDashboardCarousel").owlCarousel({
            items: 3,
            margin: 10,
            loop: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>
@endpush
@endsection
