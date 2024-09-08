@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Reservation Details</h1>

    <div class="card">
        <div class="card-header">
            Reservation #{{ $reservation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Reservation Information</h5>

            <!-- User Details -->
            <p><strong>User:</strong> {{ $reservation->user->name }}</p>
            <p><strong>Phone Number:</strong> {{ $reservation->user->phone }}</p> <!-- Display phone number -->

            <!-- Reservation Date -->
            <p><strong>Date:</strong> {{ $reservation->date }}</p>

            <!-- Time Slot -->
            <p><strong>Time Slot:</strong> {{ ucfirst($reservation->time_slot) }}</p>

            <!-- Table Number -->
            <p><strong>Table Number:</strong> Table {{ $reservation->table_number }}</p>

            <!-- Number of Guests -->
            <p><strong>Number of Guests:</strong> {{ $reservation->people_count }} guests</p>

            <!-- Special Requests -->
            <p><strong>Special Requests:</strong> {{ $reservation->special_requests ? $reservation->special_requests : 'None' }}</p>

            <!-- Actions -->
            <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
