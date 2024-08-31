<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use App\Models\MenuItem;
use App\Models\Blog;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalReservations = Reservation::count();
        $totalUsers = User::count();
        $totalMenuItems = MenuItem::count();
        $totalBlogs = Blog::count();
        $totalCategories = Category::count();

        dd($totalOrders, $totalReservations, $totalUsers, $totalMenuItems, $totalBlogs, $totalCategories);

        return view('admin.dashboard', compact(
            'totalOrders', 'totalReservations', 'totalUsers', 
            'totalMenuItems', 'totalBlogs', 'totalCategories'
        ));
    }
}
