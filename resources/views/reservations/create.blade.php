@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Book a Table</h2>
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="reservation_time" class="form-label">Reservation Time</label>
            <input type="datetime-local" class="form-control" id="reservation_time" name="reservation_time" required>
        </div>
        <div class="mb-3">
            <label for="number_of_guests" class="form-label">Number of Guests</label>
            <input type="number" class="form-control" id="number_of_guests" name="number_of_guests" required>
        </div>
        <div class="mb-3">
            <label for="special_requests" class="form-label">Special Requests (Optional)</label>
            <textarea class="form-control" id="special_requests" name="special_requests"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Book Now</button>
    </form>
</div>
@endsection
