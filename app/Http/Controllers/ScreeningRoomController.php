<?php

namespace App\Http\Controllers;

use App\Models\ScreeningRoom;
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
            'rows' => 'required|integer|min:1',
            'price_for_seat' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_SCREENING_ROOM(:seats, :rows, :price_for_seat); END;', [
                'seats' => $request->input('seats'),
                'rows' => $request->input('rows'),
                'price_for_seat' => $request->input('price_for_seat'),
            ]);
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
            'rows' => 'required|integer|min:1',
            'price_for_seat' => 'required|numeric|min:1',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_SCREENING_ROOM(:id, :seats, :rows, :price_for_seat); END;', [
                'id' => $id,
                'seats' => $request->input('seats'),
                'rows' => $request->input('rows'),
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
