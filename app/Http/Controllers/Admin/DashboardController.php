<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use App\Models\MenuItem;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalReservations = Reservation::count();
        $totalUsers = User::count();
        $totalMenuItems = MenuItem::count();
        $totalBlogs = Blog::count();
        $totalCategories = Category::count();
        $totalTeamMembers = TeamMember::count();
        $totalContactMessages = ContactMessage::count();
        $lastOrders = Order::latest()->limit(5)->get();

        return view('admin.dashboard', compact(
            'totalOrders', 'totalReservations', 'totalUsers', 
            'totalMenuItems', 'totalBlogs', 'totalCategories',
            'totalTeamMembers', 'totalContactMessages', 'lastOrders',
        ));
    }
}
