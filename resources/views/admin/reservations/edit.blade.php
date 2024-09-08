@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Reservation</h1>
    <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}">
        @csrf
        @method('PUT') <!-- Laravel's method spoofing for PUT request -->

        <!-- Reservation Time -->
        <div class="form-group">
            <label for="reservation_time">Reservation Time</label>
            <input type="datetime-local" class="form-control" id="reservation_time" name="reservation_time" value="{{ $reservation->reservation_time }}" required>
        </div>

        <!-- Number of Guests -->
        <div class="form-group">
            <label for="number_of_guests">Number of Guests</label>
            <input type="number" class="form-control" id="number_of_guests" name="number_of_guests" value="{{ $reservation->number_of_guests }}" required>
        </div>

        <!-- Special Requests -->
        <div class="form-group">
            <label for="special_requests">Special Requests</label>
            <textarea class="form-control" id="special_requests" name="special_requests">{{ $reservation->special_requests }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>
@endsection
