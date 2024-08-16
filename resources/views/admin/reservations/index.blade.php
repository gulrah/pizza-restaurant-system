@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Reservations</h1>
    <ul>
        @foreach ($reservations as $reservation)
        <li>
            <a href="{{ route('admin.reservations.show', $reservation->id) }}">
                Reservation #{{ $reservation->id }} for {{ $reservation->reservation_time }}
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
