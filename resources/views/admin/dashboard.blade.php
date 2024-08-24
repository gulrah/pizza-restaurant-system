@extends('layouts.admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>
    <div class="row g-4">
        <!-- Orders Card -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Orders</h5>
                    <p>Manage all orders, including details and statuses.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-light btn-sm">View Orders</a>
                </div>
            </div>
        </div>

        <!-- Orders Statistics Card -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #ff8c00 0%, #ffeb3b 100%);">
                <div class="card-body text-dark">
                    <h5 class="card-title">Orders Statistics</h5>
                    <h3 class="card-text">{{ $orderCount }}</h3>
                    <p>Total Orders</p>
                </div>
            </div>
        </div>

        <!-- Reservations Card -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #fc4a1a 0%, #f7b733 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Reservations</h5>
                    <p>View and manage all customer reservations.</p>
                    <a href="{{ route('admin.reservations.index') }}" class="btn btn-outline-light btn-sm">View Reservations</a>
                </div>
            </div>
        </div>

        <!-- Reservations Statistics Card -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #36d1dc 0%, #5b86e5 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Reservations Statistics</h5>
                    <h3 class="card-text">{{ $reservationCount }}</h3>
                    <p>Total Reservations</p>
                </div>
            </div>
        </div>

        <!-- Menu Management Card -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #36d1dc 0%, #5b86e5 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Menu Management</h5>
                    <p>Add, delete or modify items in the menu.</p>
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-light btn-sm">Manage Menu</a>
                </div>
            </div>
        </div>

        <!-- Blog Posts Card -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow rounded-lg" style="background: linear-gradient(to right, #ee9ca7 0%, #ffdde1 100%);">
                <div class="card-body text-white">
                    <h5 class="card-title">Blog Posts</h5>
                    <p>Create and edit blog content to engage visitors.</p>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-light btn-sm">Manage Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
