<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationSeat;
use App\Models\Seance;
use App\Models\Seat;
use App\Models\Product;
use App\Models\ReservationProduct;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function show($id)
    {
        // Pobierz seans z powiązanymi danymi o filmie i sali kinowej
        $seance = Seance::with(['film', 'screeningRoom'])->findOrFail($id);

        // Pobierz miejsca dla konkretnej sali kinowej i uporządkuj według numeru rzędu i miejsca w rzędzie
        $seats = Seat::where('screening_room_id', $seance->screeningRoom->id)->orderBy('row')->orderBy('seat_in_row')->get();
        $seatsGroupedByRow = $seats->groupBy('row');

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
                'row' => $seatModel->row,
                'seat_in_row' => $seatModel->seat_in_row,
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

        foreach ($seats as &$seat) {
            $seatModel = Seat::findOrFail($seat['id']);
            $totalPrice += $seatModel->price;
            $seat['row'] = $seatModel->row;
            $seat['seat_in_row'] = $seatModel->seat_in_row;
        }

        $products = Product::all();
        $selectedProducts = $request->input('products', []);
        foreach ($products as $product) {
            if (in_array($product->id, $selectedProducts)) {
                $totalPrice += $product->price;
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
            'user_id' => Auth::user()->id,
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

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function index()
    {
        $tickets = Ticket::orderBy('id', 'asc')->get();

        return view('admin.tickets.index', compact('tickets'));
    }

    public function create()
    {
        return view('admin.tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'voucher_id' => 'required|exists:vouchers,id',
            'price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_TICKET(:reservation_id, :voucher_id, :price, :status_of_payment); END;', [
                'reservation_id' => $request->input('reservation_id'),
                'voucher_id' => $request->input('voucher_id'),
                'price' => $request->input('price'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('tickets.create')->withErrors('Błąd podczas dodawania biletu: ' . $e->getMessage());
        }

        return redirect()->route('tickets.index')->with('success', 'Bilet został dodany.');
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        return view('admin.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'voucher_id' => 'required|exists:vouchers,id',
            'price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_TICKET(:id, :reservation_id, :voucher_id, :price, :status_of_payment); END;', [
                'id' => $id,
                'reservation_id' => $request->input('reservation_id'),
                'voucher_id' => $request->input('voucher_id'),
                'price' => $request->input('price'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('tickets.edit', $id)->withErrors('Błąd podczas aktualizacji biletu: ' . $e->getMessage());
        }

        return redirect()->route('tickets.index')->with('success', 'Bilet został zaktualizowany.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_TICKET(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('tickets.index')->withErrors('Błąd podczas usuwania biletu: ' . $e->getMessage());
        }

        return redirect()->route('tickets.index')->with('success', 'Bilet został usunięty pomyślnie.');
    }
}
