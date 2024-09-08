@extends('layouts.admin')

@section('content')
<div class="container p-4">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>

       <!-- Statistics Section with Colorful Cards -->
       <div class="row g-4">
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Total Orders</h5>
                    <h2 class="card-text">{{ $totalOrders }}</h2>
                    <p class="card-text">Orders processed this month.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-light btn-sm mt-auto">View Orders</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #fc4a1a 0%, #f7b733 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Total Reservations</h5>
                    <h2 class="card-text">{{ $totalReservations }}</h2>
                    <p class="card-text">Reservations made this month.</p>
                    <a href="{{ route('admin.reservations.index') }}" class="btn btn-outline-light btn-sm mt-auto">View Reservations</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #36d1dc 0%, #5b86e5 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Menu Items</h5>
                    <h2 class="card-text">{{ $totalMenuItems }}</h2>
                    <p class="card-text">Items listed in the menu.</p>
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-light btn-sm mt-auto">Manage Menu</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #8e44ad 0%, #3498db 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Total Users</h5>
                    <h2 class="card-text">{{ $totalUsers }}</h2>
                    <p class="card-text">Registered users on the platform.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light btn-sm mt-auto">View Users</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #ff6a00 0%, #ee0979 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Contact Messages</h5>
                    <h2 class="card-text">{{ $totalContactMessages }}</h2>
                    <p class="card-text">Messages received this month.</p>
                    <a href="{{ route('admin.messages') }}" class="btn btn-outline-light btn-sm mt-auto">View Messages</a>
                </div>
            </div>
        </div>

        <!-- Replaced Team Members with Blogs -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #ee9ca7 0%, #ffdde1 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Total Blogs</h5>
                    <h2 class="card-text">{{ $totalBlogs }}</h2>
                    <p class="card-text">Published blogs on the platform.</p>
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-outline-light btn-sm mt-auto">View Blogs</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Last Orders Section -->
    <div class="card border-0 shadow-sm rounded mt-5">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Recent Orders</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lastOrders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>${{ number_format($order->total, 2) }}</td>
                            <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="admin_accept" {{ $order->status == 'admin_accept' ? 'selected' : '' }}>Preparing</option>
                                        <option value="on_way" {{ $order->status == 'on_way' ? 'selected' : '' }}>On Way</option>
                                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </form>
                            </td>
                            <td><a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Last Reservations Section -->
    <div class="card border-0 shadow-sm rounded mt-5">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Recent Reservations</h5>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Reservation ID</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Table Number</th>
                        <th>Guests</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lastReservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->date}}</td>
                            <td>{{ ucfirst($reservation->time_slot) }}</td>
                            <td>Table {{ $reservation->table_number }}</td>
                            <td>{{ $reservation->people_count }} guests</td>
                            <td><a href="{{ route('admin.reservations.show', $reservation->id) }}" class="btn btn-info btn-sm">View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script for removing tasks -->
<script>
    document.querySelectorAll('.remove-task').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('li').remove();
        });
    });
</script>
@endsection
