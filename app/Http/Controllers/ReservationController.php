<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ReservationController extends Controller
{
    /**
     * Display a listing of the reservations for the logged-in user.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Fetch only the logged-in user's reservations and ensure they are ordered correctly
    $reservations = Reservation::where('user_id', Auth::id())->orderBy('reservation_time', 'asc')->get();
    return view('reservations.index', compact('reservations'));
}


    /**
     * Show the form for creating a new reservation.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created reservation in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {
        $reservation = new Reservation($request->all());
        $reservation->user_id = Auth::id(); // Ensure the user ID is set correctly
    
        if ($reservation->save()) {
            Log::info('Reservation saved successfully', ['id' => $reservation->id]);
        } else {
            Log::error('Reservation save failed');
        }
    
        return redirect()->route('reservations.index')->with('success', 'Reservation successfully created.');
    }
    
}
