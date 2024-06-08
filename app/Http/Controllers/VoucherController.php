<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherController extends Controller
{
    public function index()
    {
        $vouchers = Voucher::orderBy('id', 'asc')->get();

        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create()
    {
        return view('admin.vouchers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'discount' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_VOUCHER(:name, :discount); END;', [
                'name' => $request->input('name'),
                'discount' => $request->input('discount'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('vouchers.create')->withErrors('Błąd podczas dodawania vouchera: ' . $e->getMessage());
        }

        return redirect()->route('vouchers.index')->with('success', 'Voucher został dodany.');
    }

    public function edit($id)
    {
        $voucher = Voucher::findOrFail($id);

        return view('admin.vouchers.edit', compact('voucher'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'discount' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_VOUCHER(:id, :name, :discount); END;', [
                'id' => $id,
                'name' => $request->input('name'),
                'discount' => $request->input('discount'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('vouchers.edit', $id)->withErrors('Błąd podczas aktualizacji vouchera: ' . $e->getMessage());
        }

        return redirect()->route('vouchers.index')->with('success', 'Voucher został zaktualizowany.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_VOUCHER(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('vouchers.index')->withErrors('Błąd podczas usuwania vouchera: ' . $e->getMessage());
        }

        return redirect()->route('vouchers.index')->with('success', 'Voucher został usunięty pomyślnie.');
    }
}
