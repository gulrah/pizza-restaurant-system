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
use App\Http\Controllers\Admin\ContactDetailController;

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
    Route::get('/contact-details/edit', [ContactDetailController::class, 'edit'])->name('contact_details.edit');
    Route::put('/contact-details', [ContactDetailController::class, 'update'])->name('contact_details.update');    
});
// In routes/web.php
Route::patch('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');


// Orders Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
});

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    // View profile page
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

// Edit profile page
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

// Update profile information
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Delete profile (account deletion)
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User-specific reservation routes
    Route::resource('reservations', ReservationController::class)->except(['show']);
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});
// Admin Orders Routes
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('/admin/orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');
Route::patch('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

// Admin Reservations Routes
Route::get('/admin/reservations', [ReservationController::class, 'index'])->name('admin.reservations.index');
Route::get('/admin/reservations/{reservation}', [ReservationController::class, 'show'])->name('admin.reservations.show');
Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::resource('reservations', ReservationController::class);
});
Route::get('reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');
Route::get('admin/reservations/{id}', [ReservationController::class, 'show'])->name('admin.reservations.show');

// Cart actions that do not require authentication (e.g., adding/removing items)
Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');

// Protect checkout and payment routes with 'auth' middleware
Route::middleware(['auth'])->group(function () {
    Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('cart/payment', [CartController::class, 'paymentForm'])->name('cart.payment');
    Route::post('cart/payment', [CartController::class, 'processPayment'])->name('cart.processPayment');
});




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