@extends('layouts.app')

@section('content')
<div class="container-xxl py-5 bg-dark hero-header mb-5"
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg');
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Table Reservations</h1>
        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    </div>
</div>

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
