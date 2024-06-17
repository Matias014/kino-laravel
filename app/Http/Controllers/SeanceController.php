<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Seance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeanceController extends Controller
{
    public function index()
    {
        $currentDate = now()->format('Y-m-d');
        $seances = $this->getSeancesByDate($currentDate);

        return view('repertuar', compact('seances', 'currentDate'));
    }

    public function getSeances(Request $request)
    {
        $date = $request->input('date');
        $seances = $this->getSeancesByDate($date);

        return response()->json($seances);
    }

    private function getSeancesByDate($date)
    {
        return Seance::with(['film', 'screeningRoom', 'worker', 'technology', 'promotion'])
            ->whereDate('start_time', $date)
            ->orderBy('start_time', 'asc')
            ->get();
    }

    public function show($id)
    {
        $filmDetail = null;

        DB::beginTransaction();
        try {
            $stmt = DB::getPdo()->prepare('BEGIN :result := get_film_detail(:id); END;');
            $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
            $stmt->bindParam(':result', $result, \PDO::PARAM_STMT);
            $stmt->execute();

            oci_execute($result, OCI_DEFAULT);
            $filmDetail = oci_fetch_assoc($result);
            oci_free_statement($result);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('repertuar')->withErrors('Błąd podczas pobierania szczegółów filmu: ' . $e->getMessage());
        }

        return view('repertuar', compact('filmDetail'));
    }

    public function index2()
    {
        $seances = Seance::orderBy('id', 'asc')->get();

        return view('admin.seances.index', compact('seances'));
    }

    public function create()
    {
        $films = Film::all(); // Pobierz wszystkie filmy, aby wybrać odpowiedni film przy tworzeniu seansu
        return view('admin.seances.create', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'screening_room_id' => 'required|exists:screening_rooms,id',
            'worker_id' => 'required|exists:workers,id',
            'technology_id' => 'required|exists:technologies,id',
            'promotion_id' => 'nullable|exists:promotions,id',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $film = Film::findOrFail($request->input('film_id'));
        $start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('start_time'));
        $duration = (int) $film->duration; // Rzutowanie DURATION na int
        $end_time = $start_time->copy()->addMinutes($duration);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_SEANCE(:film_id, :screening_room_id, :worker_id, :technology_id, :promotion_id, :start_time, :end_time); END;', [
                'film_id' => $request->input('film_id'),
                'screening_room_id' => $request->input('screening_room_id'),
                'worker_id' => $request->input('worker_id'),
                'technology_id' => $request->input('technology_id'),
                'promotion_id' => $request->input('promotion_id'),
                'start_time' => $start_time,
                'end_time' => $end_time,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            // Sprawdź czy błąd jest związany z kolizją seansu
            if ($e->getCode() == 20003) {
                return redirect()->route('seances.create')->withErrors('Seans koliduje z innym seansem czasowo w tej samej sali kinowej.');
            } else {
                return redirect()->route('seances.create')->withErrors('Błąd podczas dodawania seansu: ' . $e->getMessage());
            }
        }

        return redirect()->route('seances.index2')->with('success', 'Seans został dodany.');
    }

    public function edit($id)
    {
        $seance = Seance::findOrFail($id);
        $films = Film::all(); // Pobierz wszystkie filmy, aby wybrać odpowiedni film przy edycji seansu

        return view('admin.seances.edit', compact('seance', 'films'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'film_id' => 'required|exists:films,id',
            'screening_room_id' => 'required|exists:screening_rooms,id',
            'worker_id' => 'required|exists:workers,id',
            'technology_id' => 'required|exists:technologies,id',
            'promotion_id' => 'nullable|exists:promotions,id',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
        ]);

        $film = Film::findOrFail($request->input('film_id'));
        $start_time = Carbon::createFromFormat('Y-m-d\TH:i', $request->input('start_time'));
        $duration = (int) $film->duration; // Rzutowanie DURATION na int
        $end_time = $start_time->copy()->addMinutes($duration);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_SEANCE(:id, :film_id, :screening_room_id, :worker_id, :technology_id, :promotion_id, :start_time, :end_time); END;', [
                'id' => $id,
                'film_id' => $request->input('film_id'),
                'screening_room_id' => $request->input('screening_room_id'),
                'worker_id' => $request->input('worker_id'),
                'technology_id' => $request->input('technology_id'),
                'promotion_id' => $request->input('promotion_id'),
                'start_time' => $start_time,
                'end_time' => $end_time,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            if ($e->getCode() == 20003) {
                return redirect()->route('seances.edit', $id)->withErrors('Seans koliduje z innym seansem czasowo w tej samej sali kinowej.');
            } else {
                return redirect()->route('seances.edit', $id)->withErrors('Błąd podczas aktualizacji seansu: ' . $e->getMessage());
            }
        }

        return redirect()->route('seances.index2')->with('success', 'Seans został zaktualizowany.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_SEANCE(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('seances.index2')->withErrors('Błąd podczas usuwania seansu: ' . $e->getMessage());
        }

        return redirect()->route('seances.index2')->with('success', 'Seans został usunięty pomyślnie.');
    }
}
