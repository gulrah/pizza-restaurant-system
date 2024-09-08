@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reserve a Table</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf

        <!-- Select Number of People -->
        <div class="form-group mb-3">
            <label for="people_count">How many people will come?</label>
            <input type="number" name="people_count" class="form-control" min="1" max="10" required>
        </div>

        <!-- Select Date -->
        <div class="form-group mb-3">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <!-- Select Time Slot -->
        <div class="form-group mb-3">
            <label for="time_slot">Select Time Slot</label>
            <select name="time_slot" class="form-control" required>
                <option value="breakfast">Breakfast (8:00 AM)</option>
                <option value="lunch">Lunch (12:30 PM)</option>
                <option value="afternoon">Afternoon (4:00 PM)</option>
                <option value="dinner">Dinner (7:00 PM)</option>
            </select>
        </div>

        <!-- Select Table Number -->
        <div class="form-group mb-3">
            <label for="table_number">Select Table Number (1-12)</label>
            <select name="table_number" class="form-control" required>
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}">Table {{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- Special Requests (Optional) -->
        <div class="form-group mb-3">
            <label for="special_requests">Special Requests (Optional)</label>
            <textarea name="special_requests" class="form-control" rows="3" placeholder="Any specific requests?"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Reserve</button>
    </form>
</div>
@endsection
