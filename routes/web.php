<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationProductController;
use App\Http\Controllers\ReservationSeatController;
use App\Http\Controllers\ScreeningRoomController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController2;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilmController::class, 'index2'])->name('index');

Route::get('/repertuar', [SeanceController::class, 'index'])->name('repertuar');
Route::get('/seances/{id}/buy', [TicketController::class, 'show'])->name('buy_ticket');
Route::get('/seances', [SeanceController::class, 'getSeances']);
// Route::post('/seances/book', [TicketController::class, 'bookSeats'])->name('book_seats');

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
    Route::resource('promotions', PromotionController::class);
    Route::resource('reservations', ReservationController::class);
    Route::resource('reservation_products', ReservationProductController::class);
    Route::resource('reservation_seats', ReservationSeatController::class);
    Route::resource('screening_rooms', ScreeningRoomController::class);
    Route::get('seances/all', [SeanceController::class, 'index2'])->name('seances.index2');
    Route::resource('seances', SeanceController::class);
    Route::resource('seats', SeatController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('users', UserController2::class);
    Route::resource('vouchers', VoucherController::class);
    Route::resource('workers', WorkerController::class);
});
