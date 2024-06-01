<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class UserController extends Controller
{
    public function showReservations()
    {
        $user = Auth::user();
        $reservations = Reservation::with(['seance.film', 'seance.screeningRoom', 'reservationSeats.seat'])
            ->where('user_id', $user->id)
            ->get();

        return view('user', compact('user', 'reservations'));
    }
}
