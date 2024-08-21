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


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
});

// Authentication Protected Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User-specific reservation routes
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
});

// Publicly Accessible Menu Viewing
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Cart Routes
Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('checkout/success', function () {
    return view('checkout.success');
})->name('checkout.success');

// Admin Specific Routes
Route::prefix('admin')->name('admin.')->middleware('is_admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Admin Menu Management
    Route::resource('menu', AdminMenuController::class);

    // Admin Order Management
    Route::resource('orders', OrderController::class);

    // Admin Reservation Management
    Route::resource('reservations', AdminReservationController::class);

    // Admin Blog Management
    Route::resource('blogs', AdminBlogController::class);
});

// Public routes for blogs
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/about', [PageController::class, 'about'])->name('about');

Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::get('/profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
Route::get('/profile/reservations', [ProfileController::class, 'reservations'])->name('profile.reservations');

require __DIR__.'/auth.php';
