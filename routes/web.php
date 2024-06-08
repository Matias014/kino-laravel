<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilmController::class, 'index2'])->name('index');

Route::get('/repertuar', [SeanceController::class, 'index'])->name('repertuar');
Route::get('/seances/{id}/buy', [TicketController::class, 'show'])->name('buy_ticket');
Route::get('/seances', [SeanceController::class, 'getSeances']);
Route::post('/seances/book', [TicketController::class, 'bookSeats'])->name('book_seats');

Route::controller(AuthController::class)->group(function () {
    Route::get('/auth/login', 'login')->name('login');
    Route::post('/auth/login', 'authenticate')->name('login.authenticate');
    Route::get('/auth/logout', 'logout')->name('logout');
});

// Nowe ścieżki do potwierdzenia zakupu
Route::post('/confirm_purchase', [TicketController::class, 'confirmPurchase'])->name('confirm_purchase');
Route::post('/purchase', [TicketController::class, 'purchase'])->name('purchase');

// Route::resource('purchase', TicketController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/user/reservations', [UserController::class, 'showReservations'])->name('user.reservations');
    Route::post('/user/reservations/{id}/cancel', [UserController::class, 'cancelReservation'])->name('user.reservations.cancel');
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/delete', [UserController::class, 'destroy'])->name('user.delete');
});

// Ścieżki admina
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('films', FilmController::class);
    Route::resource('products', ProductController::class);
    Route::get('/admin/promotions', [AdminController::class, 'promotions'])->name('admin.promotions');
    Route::get('/admin/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');
    Route::get('/admin/reservation_products', [AdminController::class, 'reservationProducts'])->name('admin.reservation_products');
    Route::get('/admin/reservation_seats', [AdminController::class, 'reservationSeats'])->name('admin.reservation_seats');
    Route::get('/admin/screening_rooms', [AdminController::class, 'screeningRooms'])->name('admin.screening_rooms');
    Route::get('/admin/seances', [AdminController::class, 'seances'])->name('admin.seances');
    Route::get('/admin/seats', [AdminController::class, 'seats'])->name('admin.seats');
    Route::get('/admin/technologies', [AdminController::class, 'technologies'])->name('admin.technologies');
    Route::get('/admin/tickets', [AdminController::class, 'tickets'])->name('admin.tickets');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/vouchers', [AdminController::class, 'vouchers'])->name('admin.vouchers');
    Route::get('/admin/workers', [AdminController::class, 'workers'])->name('admin.workers');
});
