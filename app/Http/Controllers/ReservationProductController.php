<?php

namespace App\Http\Controllers;

use App\Models\ReservationProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationProductController extends Controller
{
    public function index()
    {
        $reservationProducts = ReservationProduct::orderBy('id', 'asc')->get();

        return view('admin.reservation_products.index', compact('reservationProducts'));
    }

    public function create()
    {
        return view('admin.reservation_products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'reservation_id' => 'required|exists:reservations,id',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_RESERVATION_PRODUCT(:product_id, :reservation_id); END;', [
                'product_id' => $request->input('product_id'),
                'reservation_id' => $request->input('reservation_id'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservation_products.create')->withErrors('Błąd podczas dodawania rezerwacji produktu: ' . $e->getMessage());
        }

        return redirect()->route('reservation_products.index')->with('success', 'Rezerwacja produktu została dodana.');
    }

    public function edit($id)
    {
        $reservationProduct = ReservationProduct::findOrFail($id);

        return view('admin.reservation_products.edit', compact('reservationProduct'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'reservation_id' => 'required|exists:reservations,id',
        ]);

        DB::beginTransaction();
        try {
            // Update the reservation product
            DB::statement('BEGIN UPDATE_RESERVATION_PRODUCT(:id, :product_id, :reservation_id); END;', [
                'id' => $id,
                'product_id' => $request->input('product_id'),
                'reservation_id' => $request->input('reservation_id'),
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservation_products.edit', $id)->withErrors('Błąd podczas aktualizacji rezerwacji produktu: ' . $e->getMessage());
        }

        return redirect()->route('reservation_products.index')->with('success', 'Rezerwacja produktu została zaktualizowana.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $reservationProduct = ReservationProduct::findOrFail($id);
            DB::statement('BEGIN DELETE_RESERVATION_PRODUCT(:product_id, :reservation_id); END;', [
                'product_id' => $reservationProduct->product_id,
                'reservation_id' => $reservationProduct->reservation_id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('reservation_products.index')->withErrors('Błąd podczas usuwania rezerwacji produktu: ' . $e->getMessage());
        }

        return redirect()->route('reservation_products.index')->with('success', 'Rezerwacja produktu usunięta pomyślnie.');
    }
}
