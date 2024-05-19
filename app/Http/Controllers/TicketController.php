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
        // Pobierz seans z powiązanymi danymi o filmie i sali kinowej
        $seance = Seance::with(['film', 'screeningRoom'])->findOrFail($id);

        // Pobierz miejsca dla konkretnej sali kinowej i uporządkuj według numeru rzędu i miejsca w rzędzie
        $seats = Seat::where('screening_room_id', $seance->screeningRoom->id)->orderBy('ROW')->orderBy('SEAT_IN_ROW')->get();
        $seatsGroupedByRow = $seats->groupBy('ROW');

        return view('buy_ticket', compact('seance', 'seatsGroupedByRow'));
    }

    public function bookSeats(Request $request)
    {
        $request->validate([
            'seance_id' => 'required|exists:seances,id',
            'seats' => 'required|array',
            'seats.*.seat_id' => 'required|exists:seats,id',
        ]);

        $seanceId = $request->input('seance_id');
        $seats = $request->input('seats');

        foreach ($seats as $seat) {
            ReservationSeat::create([
                'seance_id' => $seanceId,
                'seat_id' => $seat['seat_id']
            ]);
        }

        return redirect()->back()->with('success', 'Rezerwacja zakończona sukcesem!');
    }
}
