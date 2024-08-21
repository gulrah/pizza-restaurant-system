@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">My Reservations</h1>

    <a href="{{ route('reservations.create') }}" class="btn btn-primary mb-3">Add New Reservation</a>

    @if($reservations->isEmpty())
        <div class="alert alert-info" role="alert">
            You have no reservations.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Status</th>
                        <th>Reservation Time</th>
                        <th>Number of Guests</th>
                        <th>Special Requests</th> <!-- New Column -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>
                            @if ($reservation->status === 'confirmed')
                                <span class="badge bg-success">Confirmed</span>
                            @elseif ($reservation->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif ($reservation->status === 'cancelled')
                                <span class="badge bg-danger">Cancelled</span>
                            @else
                                <span class="badge bg-secondary">Unknown</span>
                            @endif
                        </td>
                        <td>{{ $reservation->reservation_time->format('M d, Y H:i') }}</td>
                        <td>{{ $reservation->number_of_guests }}</td>
                        <td>
                            @if($reservation->special_requests)
                                {{ $reservation->special_requests }}
                            @else
                                <em>No special requests</em>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
