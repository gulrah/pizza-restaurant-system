@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>All Reservations</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Date</th>
                <th>Time Slot</th>
                <th>Table Number</th>
                <th>Guests</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->date }}</td>
                    <td>{{ ucfirst($reservation->time_slot) }}</td>
                    <td>Table {{ $reservation->table_number }}</td>
                    <td>{{ $reservation->people_count }} guests</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
