<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationSeat;
use App\Models\Seance;
use App\Models\Seat;
use App\Models\Product;
use App\Models\ReservationProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $products = Product::all(); // Pobieranie wszystkich produktów

        return view('purchase', [
            'seance' => $seance,
            'seats' => $seatDetails,
            'totalPrice' => $totalPrice,
            'products' => $products, // Przekazywanie produktów do widoku
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

        $products = Product::all(); // Pobieranie wszystkich produktów
        $selectedProducts = $request->input('products', []);
        foreach ($products as $product) {
            if (in_array($product->id, $selectedProducts)) {
                $totalPrice += $product->PRICE;
            }
        }

        return view('purchase', [
            'seance' => $seance,
            'seats' => $seats,
            'totalPrice' => $totalPrice,
            'products' => $products,
        ]);
    }

    public function confirmPurchase(Request $request)
    {
        $request->validate([
            'seance_id' => 'required|exists:seances,id',
            'seats' => 'required|json',
            'products' => 'array',
        ]);

        $seanceId = $request->input('seance_id');
        $seats = json_decode($request->input('seats'), true);
        $selectedProducts = $request->input('products', []);

        $reservation = Reservation::create([
            'seance_id' => $seanceId,
            'user_id' => Auth::user()->id, // Assuming client is logged in
        ]);

        foreach ($seats as $seat) {
            ReservationSeat::create([
                'reservation_id' => $reservation->id,
                'seat_id' => $seat['id'],
            ]);
        }

        foreach ($selectedProducts as $productId) {
            ReservationProduct::create([
                'reservation_id' => $reservation->id,
                'product_id' => $productId,
            ]);
        }

        return redirect()->route('repertuar')->with('success', 'Rezerwacja zakończona sukcesem!');
    }
}
