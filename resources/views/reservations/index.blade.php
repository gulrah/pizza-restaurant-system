@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Your Reservations</h1>
        <p class="text-white mb-4">View and manage your table reservations with ease.</p>
    </div>
</div>

<!-- Content Section -->
<div class="container">
    <div class="row mb-4">
        <div class="col text-right">
            <a href="{{ route('reservations.create') }}" class="btn btn-success btn-lg">
                <i class="fas fa-plus"></i> Book a Table
            </a>
        </div>
    </div>

    @if($reservations->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            You have no reservations yet. Click the button above to book a table.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Table Number</th>
                        <th scope="col">Guests</th>
                        <th scope="col">Special Requests</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ ucfirst($reservation->time_slot) }} ({{ $reservation->time_slot == 'breakfast' ? '8:00 AM' : ($reservation->time_slot == 'lunch' ? '12:30 PM' : ($reservation->time_slot == 'afternoon' ? '4:00 PM' : '7:00 PM')) }})</td>
                            <td>Table {{ $reservation->table_number }}</td>
                            <td>{{ $reservation->people_count }} guests</td>
                            <td>{{ $reservation->special_requests ? $reservation->special_requests : 'None' }}</td>
                            <td>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Cancel
                                    </button>
                                    <a href="{{ route('reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
