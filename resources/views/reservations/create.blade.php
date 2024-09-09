@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Contact</h1>
        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    </div>
</div>

<!-- Reservation Form -->
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="bg-light p-5 rounded shadow-sm">
                <h2 class="text-center mb-4">Make a Reservation</h2>

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
                        <label for="people_count" class="form-label">How many people will come?</label>
                        <input type="number" name="people_count" class="form-control" min="1" max="10" required>
                    </div>

                    <!-- Select Date -->
                    <div class="form-group mb-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <!-- Select Time Slot -->
                    <div class="form-group mb-3">
                        <label for="time_slot" class="form-label">Select Time Slot</label>
                        <select name="time_slot" class="form-control" required>
                            <option value="breakfast">Breakfast (8:00 AM)</option>
                            <option value="lunch">Lunch (12:30 PM)</option>
                            <option value="afternoon">Afternoon (4:00 PM)</option>
                            <option value="dinner">Dinner (7:00 PM)</option>
                        </select>
                    </div>

                    <!-- Select Table Number -->
                    <div class="form-group mb-3">
                        <label for="table_number" class="form-label">Select Table Number (1-12)</label>
                        <select name="table_number" class="form-control" required>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">Table {{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <!-- Special Requests (Optional) -->
                    <div class="form-group mb-3">
                        <label for="special_requests" class="form-label">Special Requests (Optional)</label>
                        <textarea name="special_requests" class="form-control" rows="3" placeholder="Any specific requests?"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary py-3 px-5">Reserve Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
