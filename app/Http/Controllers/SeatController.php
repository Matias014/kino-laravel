<?php

namespace App\Http\Controllers;

use App\Models\Seat;
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
            'row' => 'required|integer|min:1',
            'seat_in_row' => 'required|integer|min:1',
            'vip' => 'required|in:Y,N',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_SEAT(:screening_room_id, :row, :seat_in_row, :vip); END;', [
                'screening_room_id' => $request->input('screening_room_id'),
                'row' => $request->input('row'),
                'seat_in_row' => $request->input('seat_in_row'),
                'vip' => $request->input('vip'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('seats.create')->withErrors('Błąd podczas dodawania miejsca: ' . $e->getMessage());
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
            'row' => 'required|integer|min:1',
            'seat_in_row' => 'required|integer|min:1',
            'vip' => 'required|in:Y,N',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_SEAT(:id, :screening_room_id, :row, :seat_in_row, :vip); END;', [
                'id' => $id,
                'screening_room_id' => $request->input('screening_room_id'),
                'row' => $request->input('row'),
                'seat_in_row' => $request->input('seat_in_row'),
                'vip' => $request->input('vip'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('seats.edit', $id)->withErrors('Błąd podczas aktualizacji miejsca: ' . $e->getMessage());
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
