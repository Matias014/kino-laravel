<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilmController::class, 'index'])->name('index');

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
});
