<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\MenuItem; // Import MenuItem model to fetch the discounted items
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all team members from the database
        $teamMembers = TeamMember::all();

        // Fetch discounted items from the menu
        $discountedItem = MenuItem::where('discount_percentage', '>', 0)->inRandomOrder()->first();

        // Pass the team members and the discounted item to the view
        return view('home', compact('teamMembers', 'discountedItem'));
    }
}
