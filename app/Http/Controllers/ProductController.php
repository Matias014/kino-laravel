<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = [];

        DB::beginTransaction();
        try {
            $stmt = DB::getPdo()->prepare('BEGIN product_pkg.get_all_products(:products); END;');
            $stmt->bindParam(':products', $cursor, \PDO::PARAM_STMT);
            $stmt->execute();

            oci_execute($cursor, OCI_DEFAULT);
            while ($row = oci_fetch_assoc($cursor)) {
                $products[] = $row;
            }
            oci_free_statement($cursor);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.index')->withErrors('Błąd podczas pobierania produktów: ' . $e->getMessage());
        }

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
            DB::statement('BEGIN product_pkg.add_product(:name, :price); END;', [
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

    public function edit($id)
    {
        $product = null;

        DB::beginTransaction();
        try {
            $stmt = DB::getPdo()->prepare('BEGIN product_pkg.get_product(:id, :product); END;');
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->bindParam(':product', $cursor, \PDO::PARAM_STMT);
            $stmt->execute();

            oci_execute($cursor, OCI_DEFAULT);
            $product = oci_fetch_assoc($cursor);
            oci_free_statement($cursor);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.index')->withErrors('Błąd podczas pobierania produktu: ' . $e->getMessage());
        }

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
            DB::statement('BEGIN product_pkg.update_product(:id, :name, :price); END;', [
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

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN product_pkg.delete_product(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('products.index')->withErrors('Błąd podczas usuwania produktu: ' . $e->getMessage());
        }

        return redirect()->route('products.index')->with('success', 'Produkt usunięty pomyślnie');
    }
}
