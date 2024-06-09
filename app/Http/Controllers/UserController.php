<?php

namespace App\Http\Controllers;

use App\Models\ReservationSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showReservations()
    {
        $user = Auth::user();
        $tickets = Ticket::with(['reservation.seance.film', 'reservation.seance.screeningRoom', 'reservation.reservationSeats.seat', 'voucher'])
            ->whereHas('reservation', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();

        return view('user', compact('user', 'tickets'));
    }

    public function cancelReservation($id)
    {
        $user = Auth::user();
        $ticket = Ticket::with('reservation')->where('id', $id)->whereHas('reservation', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();

        if ($ticket) {
            // Usuń powiązane miejsca rezerwacji
            ReservationSeat::where('reservation_id', $ticket->reservation_id)->delete();
            // Usuń rezerwację
            $ticket->reservation->delete();
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
