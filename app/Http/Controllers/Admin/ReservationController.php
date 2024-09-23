<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
{
    $reservations = Reservation::with('user')->orderBy('date', 'desc')->get();
    return view('admin.reservations.index', compact('reservations'));
}



    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations.edit', compact('reservation'));
    }
    public function show($id)
{
    $reservation = Reservation::with('user')->findOrFail($id);
    return view('admin.reservations.show', compact('reservation'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'reservation_time' => 'required|date',
            'number_of_guests' => 'required|integer',
            'status' => 'required|string',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
