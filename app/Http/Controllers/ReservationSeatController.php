<?php

namespace App\Http\Controllers;

use App\Models\ReservationSeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationSeatController extends Controller
{
    public function index()
    {
        $reservationSeats = ReservationSeat::orderBy('id', 'asc')->get();

        return view('admin.Reservations_seats.index', compact('reservationSeats'));
    }

    public function create()
    {
        return view('admin.Reservations_seats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'seat_id' => 'required|exists:seats,id',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_RESERVATION_SEAT(:reservation_id, :seat_id); END;', [
                'reservation_id' => $request->input('reservation_id'),
                'seat_id' => $request->input('seat_id'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservation_seats.create')->withErrors('Błąd podczas dodawania rezerwacji miejsca: ' . $e->getMessage());
        }

        return redirect()->route('reservation_seats.index')->with('success', 'Rezerwacja miejsca została dodana.');
    }

    public function edit($id)
    {
        $reservationSeat = ReservationSeat::findOrFail($id);

        return view('admin.Reservations_seats.edit', compact('reservationSeat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'seat_id' => 'required|exists:seats,id',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_RESERVATION_SEAT(:id, :reservation_id, :seat_id); END;', [
                'id' => $id,
                'reservation_id' => $request->input('reservation_id'),
                'seat_id' => $request->input('seat_id'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservation_seats.edit', $id)->withErrors('Błąd podczas aktualizacji rezerwacji miejsca: ' . $e->getMessage());
        }

        return redirect()->route('reservation_seats.index')->with('success', 'Rezerwacja miejsca została zaktualizowana.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_RESERVATION_SEAT(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservation_seats.index')->withErrors('Błąd podczas usuwania rezerwacji miejsca: ' . $e->getMessage());
        }

        return redirect()->route('reservation_seats.index')->with('success', 'Rezerwacja miejsca usunięta pomyślnie.');
    }
}
