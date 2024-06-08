<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::orderBy('id', 'asc')->get();

        return view('admin.workers.index', compact('workers'));
    }

    public function create()
    {
        return view('admin.workers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:30',
            // 'start_time' => 'required|date',
            // 'end_time' => 'required|date|after:start_time',
        ]);

        // $start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('start_time'));
        // $end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('end_time'));

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_WORKER(:name, :surname); END;', [
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                // 'start_time' => $start_time,
                // 'end_time' => $end_time,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('workers.create')->withErrors('Błąd podczas dodawania pracownika: ' . $e->getMessage());
        }

        return redirect()->route('workers.index')->with('success', 'Pracownik został dodany.');
    }

    public function edit($id)
    {
        $worker = Worker::findOrFail($id);

        return view('admin.workers.edit', compact('worker'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:30',
            // 'start_time' => 'required|date',
            // 'end_time' => 'required|date|after:start_time',
        ]);

        // $start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('start_time'));
        // $end_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('end_time'));

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_WORKER(:id, :name, :surname); END;', [
                'id' => $id,
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                // 'start_time' => $start_time,
                // 'end_time' => $end_time,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('workers.edit', $id)->withErrors('Błąd podczas aktualizacji pracownika: ' . $e->getMessage());
        }

        return redirect()->route('workers.index')->with('success', 'Pracownik został zaktualizowany.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_WORKER(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('workers.index')->withErrors('Błąd podczas usuwania pracownika: ' . $e->getMessage());
        }

        return redirect()->route('workers.index')->with('success', 'Pracownik został usunięty pomyślnie.');
    }
}
