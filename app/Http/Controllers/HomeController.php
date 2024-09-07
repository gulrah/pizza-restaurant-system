<?php

namespace App\Http\Controllers;

use App\Models\TeamMember; // Add this line to import the TeamMember model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all team members from the database
        $teamMembers = TeamMember::all();

        // Pass the team members to the view
        return view('home', compact('teamMembers'));
    }
}

