@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>All User Reservations</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Reservation Time</th>
                <th>Guests</th>
                <th>Status</th>
                <th>Special Requests</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->reservation_time }}</td>
                <td>{{ $reservation->number_of_guests }}</td>
                <td>{{ $reservation->status }}</td>
                <td>{{ $reservation->special_requests }}</td>
                <td>
                    <!-- Add any action links here -->
                    <a href="#">View</a> | <a href="#">Edit</a> | <a href="#">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
