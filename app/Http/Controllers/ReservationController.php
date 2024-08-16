<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = auth()->user()->reservations;
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_time' => 'required|date',
            'number_of_guests' => 'required|integer',
            'special_requests' => 'nullable|string'
        ]);

        $reservation = new Reservation([
            'user_id' => auth()->id(),
            'reservation_time' => $request->reservation_time,
            'number_of_guests' => $request->number_of_guests,
            'special_requests' => $request->special_requests,
            'status' => 'pending'
        ]);

        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservation made successfully!');
    }
}
