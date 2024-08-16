<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Constructor to add middleware if needed
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    // Display a listing of reservations
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index', compact('reservations'));
    }

    // Display the specified reservation
    public function show(Reservation $reservation)
    {
        return view('admin.reservations.show', compact('reservation'));
    }

    // Show the form for editing the specified reservation
    public function edit(Reservation $reservation)
    {
        return view('admin.reservations.edit', compact('reservation'));
    }

    // Update the specified reservation in the database
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'reservation_time' => 'required|date',
            'number_of_guests' => 'required|integer',
            'status' => 'required|string'
        ]);

        $reservation->update($request->all());

        return redirect()->route('admin.reservations.index')
                         ->with('success', 'Reservation updated successfully');
    }

    // Remove the specified reservation from the database
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')
                         ->with('success', 'Reservation deleted successfully');
    }
}
