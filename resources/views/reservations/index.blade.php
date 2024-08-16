@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Reservations</h2>
    @foreach ($reservations as $reservation)
        <div>
            <p>Reservation for {{ $reservation->number_of_guests }} on {{ $reservation->reservation_time }}</p>
            <p>Status: {{ $reservation->status }}</p>
            <p>Special Requests: {{ $reservation->special_requests }}</p>
        </div>
    @endforeach
</div>
@endsection
