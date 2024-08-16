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

    $reservation = new Reservation($request->all());
    $reservation->user_id = auth()->id();
    $reservation->save();

    return redirect()->route('reservations.index')->with('success', 'Reservation made successfully!');
}
}
