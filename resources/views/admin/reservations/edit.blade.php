@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Reservation</h1>
    <form action="{{ route('admin.reservations.update', $reservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="reservation_time" class="form-label">Reservation Time</label>
            <input type="datetime-local" class="form-control" id="reservation_time" name="reservation_time" value="{{ $reservation->reservation_time->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="number_of_guests" class="form-label">Number of Guests</label>
            <input type="number" class="form-control" id="number_of_guests" name="number_of_guests" value="{{ $reservation->number_of_guests }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="pending" {{ $reservation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="cancelled" {{ $reservation->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>
@endsection
