<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'price' => 'required|numeric|min:0',
        ]);

        $name = $request->input('name');
        $price = $request->input('price');

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_PRODUCT(:name, :price); END;', [
                'name' => $name,
                'price' => $price,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.create')->withErrors('Błąd podczas dodawania produktu: ' . $e->getMessage());
        }

        return redirect()->route('products.index')->with('success', 'Produkt został dodany.');
    }


    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'price' => 'required|numeric|min:0',
        ]);

        $name = $request->input('name');
        $price = $request->input('price');

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_PRODUCT(:id, :name, :price); END;', [
                'id' => $id,
                'name' => $name,
                'price' => $price,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.edit', $id)->withErrors('Błąd podczas aktualizacji produktu: ' . $e->getMessage());
        }

        return redirect()->route('products.index')->with('success', 'Produkt został zaktualizowany.');
    }

    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_PRODUCT(:id); END;', [
                'id' => $product->id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.index')->withErrors('Błąd podczas usuwania produktu: ' . $e->getMessage());
        }

        return redirect()->route('products.index')->with('success', 'Produkt usunięty pomyślnie');
    }
}
