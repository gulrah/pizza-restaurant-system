<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\MenuController as AdminMenuController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ContactController;

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Publicly Accessible Pages
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Contact Form Submission
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin Messages (viewable by admin only)
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/messages', [ContactController::class, 'index'])->name('messages');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User-specific reservation routes
    Route::resource('reservations', ReservationController::class)->except(['show']);
});

// Cart Routes
Route::resource('cart', CartController::class);

// Admin Routes with is_admin Middleware
Route::prefix('admin')->name('admin.')->middleware('is_admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin Resources
    Route::resources([
        'menu' => AdminMenuController::class,
        'orders' => OrderController::class,
        'reservations' => AdminReservationController::class,
        'blogs' => AdminBlogController::class,
        'categories' => CategoryController::class,
        'users' => UserController::class,
        'team' => TeamMemberController::class
    ]);
});

// Authentication routes
require __DIR__.'/auth.php';
