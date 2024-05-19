<?php

namespace App\Http\Controllers;

use App\Models\Film;
// use App\Http\Requests\StoreCountryRequest;
// use App\Http\Requests\UpdateCountryRequest;
use Exception;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return view('index', ['films' => $films]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /*
    public function store(StoreCountryRequest $request)
    {
        $input = $request->all();
        Country::create($input);

        return redirect()->route('countries.index');
    }
    */

    /**
     * Display the specified resource.
     */

    /*
    public function show(Country $country)
    {
        //
        return view('countries.show', ['country' => $country]);
    }
    */

    /**
     * Show the form for editing the specified resource.
     */

     /*
    public function edit(Country $country)
    {
        return view('countries.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     */

     /*
    public function update(UpdateCountryRequest $request, Country $country)
    {
        $input = $request->all();
        $country->update($input);
        return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */


    // public function destroy(Country $country)
    // {
    //     try {
    //         $country->delete();
    //         return redirect()->route('countries.index');
    //     } catch (Exception $e) {
    //         return redirect()->route('countries.index')->with('error', 'Nie można usunąć rekordu, dla którego istnieją rekordy podrzędne.');
    //     }
    // }


}
