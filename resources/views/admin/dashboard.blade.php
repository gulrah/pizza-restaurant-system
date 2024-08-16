@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4>Orders</h4>
                </div>
                <div class="card-body">
                    <p>Manage all orders in the system.</p>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4>Reservations</h4>
                </div>
                <div class="card-body">
                    <p>View and manage reservations.</p>
                    <a href="{{ route('reservations.index') }}" class="btn btn-primary">View Reservations</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4>Menu Management</h4>
                </div>
                <div class="card-body">
                    <p>Add, update, or remove menu items.</p>
                    <a href="{{ route('menu.index') }}" class="btn btn-primary">Manage Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
