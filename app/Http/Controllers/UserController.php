<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\ReservationSeat;
use Illuminate\Support\Facades\Hash;

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

    public function cancelReservation($id)
    {
        $user = Auth::user();
        $reservation = Reservation::where('id', $id)->where('user_id', $user->id)->first();

        if ($reservation) {
            // Usuń powiązane miejsca rezerwacji
            ReservationSeat::where('reservation_id', $reservation->id)->delete();
            // Usuń rezerwację
            $reservation->delete();
            return redirect()->route('user.reservations')->with('success', 'Rezerwacja została anulowana.');
        }

        return redirect()->route('user.reservations')->with('error', 'Nie można anulować rezerwacji.');
    }


    public function edit()
    {
        $user = Auth::user();
        return view('edit_user', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:30',
            'email' => 'required|string|email|max:40|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:15',
            'password' => 'nullable|string|max:100|confirmed'
        ]);

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->phone_number = $request->input('phone_number');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->route('user.reservations')->with('success', 'Dane zostały zaktualizowane.');
    }

    public function destroy()
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect()->route('index')->with('success', 'Konto zostało usunięte.');
    }
}
