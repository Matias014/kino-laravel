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
        // $seance = Seance::with(['film', 'screeningRoom.seats'])->findOrFail($id);
        $seats = Seat::where('SCREENING_ROOM_ID', $id);
        $seatsGroupedByRow = $seats->sortBy('SEAT_IN_ROW')->groupBy('ROW');
        return view('buy_ticket', compact('seance', 'seatsGroupedByRow'));
    }

    public function bookSeats(Request $request)
    {
        $seanceId = $request->input('seance_id');
        $seats = $request->input('seats');

        foreach ($seats as $seat) {
            ReservationSeat::create([
                'seance_id' => $seanceId,
                'row' => $seat['row'],
                'seat' => $seat['seat']
            ]);
        }

        return response()->json(['success' => true]);
    }
}
