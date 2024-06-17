<?php

namespace App\Http\Controllers;

use App\Models\ScreeningRoom;
use App\Models\Seat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScreeningRoomController extends Controller
{
    public function index()
    {
        $screeningRooms = ScreeningRoom::orderBy('id', 'asc')->get();

        return view('admin.screening_rooms.index', compact('screeningRooms'));
    }

    public function create()
    {
        return view('admin.screening_rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'seats' => 'required|integer|min:1',
            'number_of_rows' => 'required|integer|min:1',
            'price_for_seat' => 'required|numeric|min:1',
        ]);

        $seats = $request->input('seats');
        $rows = $request->input('number_of_rows');
        $priceForSeat = $request->input('price_for_seat');

        DB::beginTransaction();
        try {
            // Tworzenie nowej sali kinowej za pomocą surowego zapytania SQL
            $screeningRoomId = DB::table('screening_rooms')->insertGetId([
                'seats' => $seats,
                'number_of_rows' => $rows,
                'price_for_seat' => $priceForSeat,
            ]);

            // Obliczanie liczby miejsc w rzędach
            $seatsPerRow = intdiv($seats, $rows);
            // $remainingSeats = $seats % $rows;

            // Dodawanie miejsc za pomocą procedury PL/SQL
            $currentRow = 1;
            while ($seats > 0) {
                $seatsInCurrentRow = min($seatsPerRow, $seats);

                for ($seat = 1; $seat <= $seatsInCurrentRow; $seat++) {
                    DB::statement('BEGIN ADD_SEAT(:screening_room_id, :row_number, :seat_in_row, :vip); END;', [
                        'screening_room_id' => $screeningRoomId,
                        'row_number' => $currentRow,
                        'seat_in_row' => $seat,
                        'vip' => 'N', // Możesz dostosować logikę ustawiania VIP
                    ]);
                }

                $seats -= $seatsInCurrentRow;
                $currentRow++;
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('screening_rooms.create')->withErrors('Błąd podczas dodawania sali projekcyjnej: ' . $e->getMessage());
        }

        return redirect()->route('screening_rooms.index')->with('success', 'Sala projekcyjna została dodana.');
    }

    public function edit($id)
    {
        $screeningRoom = ScreeningRoom::findOrFail($id);

        return view('admin.screening_rooms.edit', compact('screeningRoom'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'seats' => 'required|integer|min:1',
            'number_of_rows' => 'required|integer|min:1',
            'price_for_seat' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_SCREENING_ROOM(:id, :seats, :number_of_rows, :price_for_seat); END;', [
                'id' => $id,
                'seats' => $request->input('seats'),
                'number_of_rows' => $request->input('number_of_rows'),
                'price_for_seat' => $request->input('price_for_seat'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('screening_rooms.edit', $id)->withErrors('Błąd podczas aktualizacji sali projekcyjnej: ' . $e->getMessage());
        }

        return redirect()->route('screening_rooms.index')->with('success', 'Sala projekcyjna została zaktualizowana.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_SCREENING_ROOM(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('screening_rooms.index')->withErrors('Błąd podczas usuwania sali projekcyjnej: ' . $e->getMessage());
        }

        return redirect()->route('screening_rooms.index')->with('success', 'Sala projekcyjna została usunięta pomyślnie.');
    }
}
