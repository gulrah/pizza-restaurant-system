@extends('layouts.admin')

@section('content')
<div class="container-fluid p-4">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>

    <div class="row g-4">
        <!-- Statistics Cards -->
        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Total Orders</h5>
                    <h2 class="card-text">{{ $totalOrders }}</h2>
                    <p class="card-text">Orders processed this month.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-light btn-sm mt-auto">View Orders</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #fc4a1a 0%, #f7b733 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Total Reservations</h5>
                    <h2 class="card-text">{{ $totalReservations }}</h2>
                    <p class="card-text">Reservations made this month.</p>
                    <a href="{{ route('admin.reservations.index') }}" class="btn btn-outline-light btn-sm mt-auto">View Reservations</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #36d1dc 0%, #5b86e5 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Menu Items</h5>
                    <h2 class="card-text">{{ $totalMenuItems }}</h2>
                    <p class="card-text">Items listed in the menu. Lorem ipsum dolor sit amet.</p>
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-outline-light btn-sm mt-auto">Manage Menu</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #8e44ad 0%, #3498db 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Total Users</h5>
                    <h2 class="card-text">{{ $totalUsers }}</h2>
                    <p class="card-text">Registered users on the platform.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-light btn-sm mt-auto">View Users</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #ff6a00 0%, #ee0979 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Contact Messages</h5>
                    <h2 class="card-text">{{ $totalContactMessages }}</h2>
                    <p class="card-text">Messages received this month.</p>
                    <a href="{{ route('admin.messages') }}" class="btn btn-outline-light btn-sm mt-auto">View Messages</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #fc4a1a 0%, #f7b733 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Contact Details</h5>
                    <p class="card-text">Update contact details for the site. Lorem, ipsum dolor sit amet consectetur adipisicing.</p>
                    <a href="{{ route('admin.contact_details.edit') }}" class="btn btn-outline-light btn-sm mt-auto">Edit Details</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border-0 shadow-sm rounded" style="background: linear-gradient(to right, #ee9ca7 0%, #ffdde1 100%);">
                <div class="card-body text-white d-flex flex-column align-items-start">
                    <h5 class="card-title">Team Members</h5>
                    <h2 class="card-text">{{ $totalTeamMembers }}</h2>
                    <p class="card-text">See Team Members.</p>
                    <a href="{{ route('admin.team.index') }}" class="btn btn-outline-light btn-sm mt-auto">View Team Members</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Remaining Dashboard Sections (Recent Activities, To-Do List, etc.) -->
    <div class="row g-4 mt-4">
        <!-- Last Orders Section -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Last Orders</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($lastOrders as $order)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>Order #{{ $order->id }}</strong> by {{ $order->user->name }}<br>
                                Total: ${{ number_format($order->total, 2) }}<br>
                                Date: {{ $order->created_at->format('Y-m-d H:i') }}
                            </div>
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex align-items-center">
                                @csrf
                                @method('PATCH')
                                <select name="status" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="admin_accept" {{ $order->status == 'admin_accept' ? 'selected' : '' }}>Preparing</option>
                                    <option value="on_way" {{ $order->status == 'on_way' ? 'selected' : '' }}>On Way</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </form>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- To-Do List -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">To-Do List</h5>
                    <button id="addTaskBtn" class="btn btn-light btn-sm">Add New Task</button>
                </div>
                <div class="card-body">
                    <ul id="taskList" class="list-group">
                        <!-- Example Tasks -->
                        <li class="list-group-item d-flex align-items-center">
                            <input type="checkbox" id="task1" class="form-check-input me-2">
                            <label for="task1" class="form-check-label flex-grow-1">Update menu with new seasonal items</label>
                            <button class="btn btn-danger btn-sm ms-2 remove-task">Delete</button>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <input type="checkbox" id="task2" class="form-check-input me-2">
                            <label for="task2" class="form-check-label flex-grow-1">Prepare marketing materials for new blog post</label>
                            <button class="btn btn-danger btn-sm ms-2 remove-task">Delete</button>
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <input type="checkbox" id="task3" class="form-check-input me-2">
                            <label for="task3" class="form-check-label flex-grow-1">Review customer feedback for recent changes</label>
                            <button class="btn btn-danger btn-sm ms-2 remove-task">Delete</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
