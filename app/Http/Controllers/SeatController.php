<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\ScreeningRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::orderBy('id', 'asc')->get();

        return view('admin.seats.index', compact('seats'));
    }

    public function create()
    {
        return view('admin.seats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'screening_room_id' => 'required|exists:screening_rooms,id',
            'row_number' => 'required|integer|min:1',
            'seat_in_row' => 'required|integer|min:1',
            'vip' => 'required|in:T,N',
        ]);

        // Pobierz informacje o sali kinowej
        $screeningRoom = ScreeningRoom::findOrFail($request->input('screening_room_id'));

        // Sprawdź zakresy
        if ($request->input('row_number') > $screeningRoom->number_of_rows || $request->input('row_number') < 1) {
            return redirect()->route('seats.create')->withErrors('Numer rzędu wykracza poza dozwolony zakres dla tej sali.');
        }

        $seatsPerRow = intdiv($screeningRoom->seats, $screeningRoom->number_of_rows);
        $remainingSeats = $screeningRoom->seats % $screeningRoom->number_of_rows;

        if ($request->input('row_number') == $screeningRoom->number_of_rows) {
            $seatsPerRow += $remainingSeats;
        }

        if ($request->input('seat_in_row') > $seatsPerRow || $request->input('seat_in_row') < 1) {
            return redirect()->route('seats.create')->withErrors('Numer miejsca w rzędzie wykracza poza dozwolony zakres dla tej sali.');
        }

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_SEAT(:screening_room_id, :row_number, :seat_in_row, :vip); END;', [
                'screening_room_id' => $request->input('screening_room_id'),
                'row_number' => $request->input('row_number'),
                'seat_in_row' => $request->input('seat_in_row'),
                'vip' => $request->input('vip'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Sprawdź, czy wyjątek jest związany z dodaniem zduplikowanego miejsca
            if ($e->getCode() == '20001') {
                return redirect()->route('seats.create')->withErrors('Miejsce o podanym numerze rzędu i numerze miejsca w rzędzie już istnieje w tej sali projekcyjnej.');
            } else {
                return redirect()->route('seats.create')->withErrors('Błąd podczas dodawania miejsca: ' . $e->getMessage());
            }
        }

        return redirect()->route('seats.index')->with('success', 'Miejsce zostało dodane.');
    }

    public function edit($id)
    {
        $seat = Seat::findOrFail($id);

        return view('admin.seats.edit', compact('seat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'screening_room_id' => 'required|exists:screening_rooms,id',
            'row_number' => 'required|integer|min:1',
            'seat_in_row' => 'required|integer|min:1',
            'vip' => 'required|in:T,N',
        ]);

        // Pobierz informacje o sali kinowej
        $screeningRoom = ScreeningRoom::findOrFail($request->input('screening_room_id'));

        // Sprawdź zakresy
        if ($request->input('row_number') > $screeningRoom->number_of_rows || $request->input('row_number') < 1) {
            return redirect()->route('seats.edit', $id)->withErrors('Numer rzędu wykracza poza dozwolony zakres dla tej sali.');
        }

        $seatsPerRow = intdiv($screeningRoom->seats, $screeningRoom->number_of_rows);
        $remainingSeats = $screeningRoom->seats % $screeningRoom->number_of_rows;

        if ($request->input('row_number') == $screeningRoom->number_of_rows) {
            $seatsPerRow += $remainingSeats;
        }

        if ($request->input('seat_in_row') > $seatsPerRow || $request->input('seat_in_row') < 1) {
            return redirect()->route('seats.edit', $id)->withErrors('Numer miejsca w rzędzie wykracza poza dozwolony zakres dla tej sali.');
        }

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_SEAT(:id, :screening_room_id, :row_number, :seat_in_row, :vip); END;', [
                'id' => $id,
                'screening_room_id' => $request->input('screening_room_id'),
                'row_number' => $request->input('row_number'),
                'seat_in_row' => $request->input('seat_in_row'),
                'vip' => $request->input('vip'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Sprawdź, czy wyjątek jest związany z dodaniem zduplikowanego miejsca
            if ($e->getCode() == '20001') {
                return redirect()->route('seats.edit', $id)->withErrors('Miejsce o podanym numerze rzędu i numerze miejsca w rzędzie już istnieje w tej sali projekcyjnej.');
            } else {
                return redirect()->route('seats.edit', $id)->withErrors('Błąd podczas aktualizacji miejsca: ' . $e->getMessage());
            }
        }

        return redirect()->route('seats.index')->with('success', 'Miejsce zostało zaktualizowane.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_SEAT(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('seats.index')->withErrors('Błąd podczas usuwania miejsca: ' . $e->getMessage());
        }

        return redirect()->route('seats.index')->with('success', 'Miejsce zostało usunięte pomyślnie.');
    }
}
