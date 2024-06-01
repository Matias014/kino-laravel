<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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

        // Pobierz rezerwacje dla danego seansu
        $reservations = Reservation::where('seance_id', $id)->pluck('id')->toArray();
        $reservedSeats = ReservationSeat::whereIn('reservation_id', $reservations)->pluck('seat_id')->toArray();

        return view('buy_ticket', compact('seance', 'seatsGroupedByRow', 'reservedSeats'));
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
        $totalPrice = 0;
        $seatDetails = [];

        foreach ($seats as $seat) {
            $seatModel = Seat::findOrFail($seat['seat_id']);
            $totalPrice += $seatModel->price; // Assuming you have a price column
            $seatDetails[] = [
                'id' => $seatModel->id,
                'row' => $seatModel->ROW,
                'seat_in_row' => $seatModel->SEAT_IN_ROW,
                'price' => $seatModel->price, // Dodanie ceny dla każdego miejsca
            ];
        }

        $seance = Seance::with(['film', 'screeningRoom'])->findOrFail($seanceId);

        return view('purchase', [
            'seance' => $seance,
            'seats' => $seatDetails,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function purchase(Request $request)
    {
        $seance = Seance::with(['film', 'screeningRoom'])->findOrFail($request->input('seance_id'));
        $seats = json_decode($request->input('seats'), true);
        $totalPrice = 0;

        foreach ($seats as &$seat) { // Użyj referencji, aby zaktualizować elementy bezpośrednio w tablicy
            $seatModel = Seat::findOrFail($seat['id']);
            $totalPrice += $seatModel->price;
            $seat['row'] = $seatModel->ROW;
            $seat['seat_in_row'] = $seatModel->SEAT_IN_ROW;
        }

        return view('purchase', [
            'seance' => $seance,
            'seats' => $seats,
            'totalPrice' => $totalPrice,
        ]);
    }


    public function confirmPurchase(Request $request)
    {
        $request->validate([
            'seance_id' => 'required|exists:seances,id',
            'seats' => 'required|json',
        ]);

        $seanceId = $request->input('seance_id');
        $seats = json_decode($request->input('seats'), true);

        $reservation = Reservation::create([
            'seance_id' => $seanceId,
            'user_id' => 1, // Ustawienie statyczne ID klienta
        ]);

        foreach ($seats as $seat) {
            ReservationSeat::create([
                'reservation_id' => $reservation->id,
                'seat_id' => $seat['id'],
            ]);
        }

        return redirect()->route('buy_ticket', ['id' => $seanceId])->with('success', 'Rezerwacja zakończona sukcesem!');
    }
}
