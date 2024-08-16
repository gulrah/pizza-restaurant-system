<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        // Fetch all reservations with user information
        $reservations = Reservation::with('user')->orderBy('created_at', 'desc')->get();
        return view('admin.reservations.index', compact('reservations'));
    }

    // Add other methods as needed for detailed view, edit, delete, etc.
}
