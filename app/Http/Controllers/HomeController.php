<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teamMembers = TeamMember::all();

        $discountedItem = MenuItem::where('discount_percentage', '>', 0)->inRandomOrder()->first();

        return view('home', compact('teamMembers', 'discountedItem'));
    }
}
