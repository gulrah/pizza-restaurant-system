@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Reservations</h1>
    <a href="{{ route('reservations.create') }}" class="btn btn-primary">Add New Reservation</a>

    @if($reservations->isEmpty())
        <p>You have no reservations.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Status</th>
                    <th>Reserved On</th>
                    <th>Reservation Time</th>
                    <th>Number of Guests</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->status }}</td>
                    <td>{{ $reservation->created_at->format('M d, Y') }}</td>
                    <td>{{ $reservation->reservation_time->format('M d, Y H:i') }}</td>
                    <td>{{ $reservation->number_of_guests }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
