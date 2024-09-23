@extends('layouts.app')

<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Edit Reservation</h1>
        <p class="text-white mb-4">Update your reservation details below.</p>
    </div>
</div>

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-light p-5 rounded shadow-sm">
                <h2 class="text-center mb-4">Edit Your Reservation</h2>

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
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ $reservation->date }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="time_slot" class="form-label">Time Slot</label>
                        <select name="time_slot" class="form-control" required>
                            <option value="breakfast" {{ $reservation->time_slot == 'breakfast' ? 'selected' : '' }}>Breakfast (8:00 AM)</option>
                            <option value="lunch" {{ $reservation->time_slot == 'lunch' ? 'selected' : '' }}>Lunch (12:30 PM)</option>
                            <option value="afternoon" {{ $reservation->time_slot == 'afternoon' ? 'selected' : '' }}>Afternoon (4:00 PM)</option>
                            <option value="dinner" {{ $reservation->time_slot == 'dinner' ? 'selected' : '' }}>Dinner (7:00 PM)</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="table_number" class="form-label">Table Number</label>
                        <select name="table_number" class="form-control" required>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ $reservation->table_number == $i ? 'selected' : '' }}>Table {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="people_count" class="form-label">Number of People</label>
                        <input type="number" name="people_count" class="form-control" value="{{ $reservation->people_count }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="special_requests" class="form-label">Special Requests (Optional)</label>
                        <textarea name="special_requests" class="form-control" rows="3">{{ $reservation->special_requests }}</textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary py-3 px-5">Update Reservation</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
