@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Reservations</h1>
    <a href="{{ route('reservations.create') }}" class="btn btn-primary">Add New Reservation</a>
    <ul>
        @foreach ($reservations as $reservation)
            <li>
                Reservation at {{ $reservation->reservation_time }} for {{ $reservation->number_of_guests }} guests - {{ $reservation->status }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
