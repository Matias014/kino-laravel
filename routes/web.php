<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\TicketController;

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/index', function () {
//     return view('index');
// });

Route::controller(FilmController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});

// Route::get('/repertuar', function () {
//     return view('repertuar');
// })->name('repertuar');

Route::get('/repertuar', [SeanceController::class, 'index'])->name('repertuar');
Route::get('/seances/{id}/buy', [TicketController::class, 'show'])->name('buy_ticket');
Route::get('/seances', [SeanceController::class, 'getSeances']);
Route::post('/seances/book', [TicketController::class, 'bookSeats'])->name('book_seats');
