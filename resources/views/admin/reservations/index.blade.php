@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>All Reservations</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Reservation Time</th>
                <th>Guests</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->reservation_time }}</td>
                <td>{{ $reservation->number_of_guests }}</td>
                <td>{{ $reservation->status }}</td>
                <td>
                    <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
