<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
{
    $reservations = Reservation::where('user_id', Auth::id())->get();
    return view('reservations.index', compact('reservations'));
}

public function destroy($id)
{
    $reservation = Reservation::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    $reservation->delete();

    return redirect()->route('reservations.index')->with('success', 'Reservation cancelled successfully.');
}

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'people_count' => 'required|integer|min:1|max:10',
        'date' => 'required|date',
        'time_slot' => 'required|string',
        'table_number' => 'required|integer|min:1|max:12',
    ]);

    // Check if the table is already reserved for the selected date and time slot
    $existingReservation = Reservation::where('table_number', $request->table_number)
        ->where('date', $request->date)
        ->where('time_slot', $request->time_slot)
        ->exists();

    // If a reservation exists, return a validation error
    if ($existingReservation) {
        return back()->withErrors([
            'table_number' => 'This table is already reserved for the selected time slot. Please choose another table or time.',
        ])->withInput();
    }

    // Create a new reservation if no conflict exists
    Reservation::create([
        'user_id' => Auth::id(),
        'date' => $request->date,
        'time_slot' => $request->time_slot,
        'people_count' => $request->people_count,
        'table_number' => $request->table_number,
        'special_requests' => $request->special_requests, // Optional field
    ]);

    return redirect()->route('reservations.index')->with('success', 'Your reservation has been made.');
}
public function edit($id)
{
    $reservation = Reservation::findOrFail($id); // Find the reservation by ID or fail
    return view('reservations.edit', compact('reservation')); // Pass the reservation to the view
}

public function update(Request $request, $id)
{
    $request->validate([
        'people_count' => 'required|integer|min:1|max:10',
        'date' => 'required|date',
        'time_slot' => 'required|string',
        'table_number' => 'required|integer|min:1|max:12',
    ]);

    // Check if the table is already reserved for the selected date and time slot by another reservation
    $existingReservation = Reservation::where('table_number', $request->table_number)
        ->where('date', $request->date)
        ->where('time_slot', $request->time_slot)
        ->where('id', '!=', $id) // Exclude the current reservation
        ->exists();

    if ($existingReservation) {
        return back()->withErrors([
            'table_number' => 'This table is already reserved for the selected time slot. Please choose another table or time.',
        ])->withInput();
    }

    // Update the reservation
    $reservation = Reservation::findOrFail($id);
    $reservation->update([
        'date' => $request->date,
        'time_slot' => $request->time_slot,
        'people_count' => $request->people_count,
        'table_number' => $request->table_number,
        'special_requests' => $request->special_requests,
    ]);

    return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
}


}
