<?php

namespace App\Http\Controllers;

use App\Models\Seance;
use Illuminate\Http\Request;

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
            ->whereDate('START_TIME', $date)
            ->orderBy('START_TIME', 'asc')
            ->get();
    }
}
