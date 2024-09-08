@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Reservation</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('reservations.update', $reservation->id) }}">
        @csrf
        @method('PUT') <!-- Spoofing the PUT method -->

        <!-- Date -->
        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $reservation->date }}" required>
        </div>

        <!-- Time Slot -->
        <div class="form-group mb-3">
            <label for="time_slot">Time Slot</label>
            <select name="time_slot" class="form-control" required>
                <option value="breakfast" {{ $reservation->time_slot == 'breakfast' ? 'selected' : '' }}>Breakfast (8:00 AM)</option>
                <option value="lunch" {{ $reservation->time_slot == 'lunch' ? 'selected' : '' }}>Lunch (12:30 PM)</option>
                <option value="afternoon" {{ $reservation->time_slot == 'afternoon' ? 'selected' : '' }}>Afternoon (4:00 PM)</option>
                <option value="dinner" {{ $reservation->time_slot == 'dinner' ? 'selected' : '' }}>Dinner (7:00 PM)</option>
            </select>
        </div>

        <!-- Table Number -->
        <div class="form-group mb-3">
            <label for="table_number">Table Number</label>
            <select name="table_number" class="form-control" required>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $reservation->table_number == $i ? 'selected' : '' }}>Table {{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- Number of People -->
        <div class="form-group mb-3">
            <label for="people_count">Number of People</label>
            <input type="number" name="people_count" class="form-control" value="{{ $reservation->people_count }}" required>
        </div>

        <!-- Special Requests -->
        <div class="form-group mb-3">
            <label for="special_requests">Special Requests (Optional)</label>
            <textarea name="special_requests" class="form-control" rows="3">{{ $reservation->special_requests }}</textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>
@endsection
