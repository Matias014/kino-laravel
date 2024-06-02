<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::orderBy('id', 'asc')->get();
        return view('admin.films.index', compact('films'));
    }

    public function index2()
    {
        $films = Film::all();
        return view('index', compact('films'));
    }

    public function create()
    {
        return view('admin.films.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'duration' => 'required|string|max:10',
            'genre' => 'required|string|max:60',
            'img' => 'nullable|image|max:1024', // max 1MB
        ]);

        // $input = [
        //     'NAME' => $request->name,
        //     'DESCRIPTION' => $request->description,
        //     'DURATION' => $request->duration,
        //     'GENRE' => $request->genre,
        // ];

        $name = $request->input('name');
        $description = $request->input('description');
        $duration = $request->input('duration');
        $genre = $request->input('genre');


        if ($request->hasFile('img')) {
            $imageName = $request->img->getClientOriginalName();
            $request->img->move(public_path('storage/img'), $imageName);
            $input['IMG'] = $imageName;
        }

        $img = $imageName;

        DB::beginTransaction();
        try {
            DB::statement('BEGIN add_film(:name, :description, :duration, :genre, :img); END;', [
                'name' => $name,
                'description' => $description,
                'duration' => $duration,
                'genre' => $genre,
                'img' => $img,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('films.create')->withErrors('Błąd podczas dodawania filmu: ' . $e->getMessage());
        }

        // Film::create($input);

        return redirect()->route('films.index')->with('success', 'Film został dodany.');
    }

    public function show(Film $film)
    {
        return view('admin.films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        return view('admin.films.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        $film = Film::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string|max:1000',
            'duration' => 'required|string|max:10',
            'genre' => 'required|string|max:60',
            'img' => 'nullable|image|max:1024', // max 1MB
        ]);

        // $input = [
        //     'NAME' => $request->name,
        //     'DESCRIPTION' => $request->description,
        //     'DURATION' => $request->duration,
        //     'GENRE' => $request->genre,
        // ];

        $imageName = $film->img; // Zachowaj aktualną nazwę obrazka

        $name = $request->input('name');
        $description = $request->input('description');
        $duration = $request->input('duration');
        $genre = $request->input('genre');


        if ($request->hasFile('img')) {
            $imageName = $request->img->getClientOriginalName();
            $request->img->move(public_path('storage/img'), $imageName);
            $input['IMG'] = $imageName;
        }

        $img = $imageName; // Upewnij się, że img nie jest NULL

        // $film->update($input);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN UPDATE_FILM(:id, :name, :description, :duration, :genre, :img); END;', [
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'duration' => $duration,
                'genre' => $genre,
                'img' => $img,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('films.edit', $id)->withErrors('Błąd podczas aktualizacji filmu: ' . $e->getMessage());
        }

        return redirect()->route('films.index')->with('success', 'Film został zaktualizowany.');
    }

    public function destroy(Film $film)
    {
        // $film->delete();
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_FILM(:id); END;', [
                'id' => $film->id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('films.index')->withErrors('Błąd podczas usuwania filmu: ' . $e->getMessage());
        }

        return redirect()->route('films.index')->with('success', 'Film usunięty pomyślnie');
    }
}
