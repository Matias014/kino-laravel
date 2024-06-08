<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('id', 'asc')->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('admin.reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'seance_id' => 'required|exists:seances,id',
            'user_id' => 'required|exists:users,id',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_RESERVATION(:seance_id, :user_id); END;', [
                'seance_id' => $request->input('seance_id'),
                'user_id' => $request->input('user_id'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservations.create')->withErrors('Błąd podczas dodawania rezerwacji: ' . $e->getMessage());
        }

        return redirect()->route('reservations.index')->with('success', 'Rezerwacja została dodana.');
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('admin.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'seance_id' => 'required|exists:seances,id',
            'user_id' => 'required|exists:users,id',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_RESERVATION(:id, :seance_id, :user_id); END;', [
                'id' => $id,
                'seance_id' => $request->input('seance_id'),
                'user_id' => $request->input('user_id'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservations.edit', $id)->withErrors('Błąd podczas aktualizacji rezerwacji: ' . $e->getMessage());
        }

        return redirect()->route('reservations.index')->with('success', 'Rezerwacja została zaktualizowana.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_RESERVATION(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservations.index')->withErrors('Błąd podczas usuwania rezerwacji: ' . $e->getMessage());
        }

        return redirect()->route('reservations.index')->with('success', 'Rezerwacja została usunięta pomyślnie.');
    }
}
