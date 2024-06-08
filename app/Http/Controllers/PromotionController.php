<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::orderBy('id', 'asc')->get();

        // Convert date strings to Carbon instances
        foreach ($promotions as $promotion) {
            $promotion->start_time = Carbon::parse($promotion->start_time);
            $promotion->end_time = Carbon::parse($promotion->end_time);
        }

        return view('admin.promotions.index', compact('promotions'));
    }

    public function create()
    {
        return view('admin.promotions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'discount' => 'required|numeric|min:0|max:100',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $discount = $request->input('discount');
        $start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('start_time'));
        $end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('end_time'));

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_PROMOTION(:discount, :start_time, :end_time); END;', [
                'discount' => $discount,
                'start_time' => $start_time,
                'end_time' => $end_time,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('promotions.create')->withErrors('Błąd podczas dodawania promocji: ' . $e->getMessage());
        }

        return redirect()->route('promotions.index')->with('success', 'Promocja została dodana.');
    }

    public function edit(Promotion $promotion)
    {
        $promotion->start_time = Carbon::parse($promotion->start_time);
        $promotion->end_time = Carbon::parse($promotion->end_time);

        return view('admin.promotions.edit', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'discount' => 'required|numeric|min:0|max:100',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $discount = $request->input('discount');
        $start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('start_time'));
        $end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('end_time'));

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_PROMOTION(:id, :discount, :start_time, :end_time); END;', [
                'id' => $id,
                'discount' => $discount,
                'start_time' => $start_time,
                'end_time' => $end_time,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('promotions.edit', $id)->withErrors('Błąd podczas aktualizacji promocji: ' . $e->getMessage());
        }

        return redirect()->route('promotions.index')->with('success', 'Promocja została zaktualizowana.');
    }

    public function destroy(Promotion $promotion)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_PROMOTION(:id); END;', [
                'id' => $promotion->id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('promotions.index')->withErrors('Błąd podczas usuwania promocji: ' . $e->getMessage());
        }

        return redirect()->route('promotions.index')->with('success', 'Promocja usunięta pomyślnie');
    }
}
