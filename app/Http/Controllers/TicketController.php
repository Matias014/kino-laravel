<?php

namespace App\Http\Controllers;

use App\Models\ReservationSeat;
use App\Models\Seance;
use App\Models\Seat;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function show($id)
    {
        // Zakładam, że zmienna $seance jest również potrzebna w widoku, więc odkomentowuję linię i poprawiam zmienną.
        $seance = Seance::with(['film', 'screeningRoom.seats'])->findOrFail($id);

        // Pobierz miejsca, uporządkuj je według kolumny SEAT_IN_ROW i pogrupuj według kolumny ROW.
        $seats = Seat::where('SCREENING_ROOM_ID', $id)->orderBy('SEAT_IN_ROW')->get();
        $seatsGroupedByRow = $seats->groupBy('ROW');

        return view('buy_ticket', compact('seance', 'seatsGroupedByRow'));
    }

    public function bookSeats(Request $request)
    {
        $request->validate([
            'seance_id' => 'required|exists:seances,id',
            'seats' => 'required|array',
            'seats.*.row' => 'required|integer',
            'seats.*.seat' => 'required|integer',
        ]);

        $seanceId = $request->input('seance_id');
        $seats = $request->input('seats');

        foreach ($seats as $seat) {
            ReservationSeat::create([
                'seance_id' => $seanceId,
                'row' => $seat['row'],
                'seat' => $seat['seat']
            ]);
        }

        return redirect()->back()->with('success', 'Seats booked successfully!');
    }
}
