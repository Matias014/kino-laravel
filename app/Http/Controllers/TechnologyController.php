<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('id', 'asc')->get();

        return view('admin.technologies.index', compact('technologies'));
    }

    public function create()
    {
        return view('admin.technologies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30|unique:technologies,name',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_TECHNOLOGY(:name); END;', [
                'name' => $request->input('name'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('technologies.create')->withErrors('Błąd podczas dodawania technologii: ' . $e->getMessage());
        }

        return redirect()->route('technologies.index')->with('success', 'Technologia została dodana.');
    }

    public function edit($id)
    {
        $technology = Technology::findOrFail($id);

        return view('admin.technologies.edit', compact('technology'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30|unique:technologies,name,' . $id,
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_TECHNOLOGY(:id, :name); END;', [
                'id' => $id,
                'name' => $request->input('name'),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('technologies.edit', $id)->withErrors('Błąd podczas aktualizacji technologii: ' . $e->getMessage());
        }

        return redirect()->route('technologies.index')->with('success', 'Technologia została zaktualizowana.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_TECHNOLOGY(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('technologies.index')->withErrors('Błąd podczas usuwania technologii: ' . $e->getMessage());
        }

        return redirect()->route('technologies.index')->with('success', 'Technologia została usunięta pomyślnie.');
    }
}
