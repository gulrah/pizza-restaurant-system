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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Admin routes with auth and is_admin middleware
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/messages', [ContactController::class, 'index'])->name('messages');
    Route::get('/contact-details/edit', [ContactDetailController::class, 'edit'])->name('contact_details.edit');
    Route::put('/contact-details', [ContactDetailController::class, 'update'])->name('contact_details.update');
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

Route::patch('/admin/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');

// Orders routes for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrdersController::class, 'index'])->name('orders.index');
});

// User-specific reservation routes
Route::middleware(['auth'])->group(function () {
    Route::resource('reservations', ReservationController::class)->except(['show']);
    Route::delete('/reservations/{id}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});

// Cart routes
Route::post('cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('cart/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::get('cart', [CartController::class, 'index'])->name('cart.index');

Route::middleware(['auth'])->group(function () {
    Route::get('cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('cart/payment', [CartController::class, 'paymentForm'])->name('cart.payment');
    Route::post('cart/payment', [CartController::class, 'processPayment'])->name('cart.processPayment');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

require __DIR__.'/auth.php';
