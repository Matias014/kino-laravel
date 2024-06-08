<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController2 extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:30',
            'email' => 'required|string|email|max:40|unique:users,email',
            'phone_number' => 'required|integer|digits:9',
            'password' => 'required|string|min:1',
        ]);

        DB::beginTransaction();
        try {
            DB::statement('BEGIN ADD_USER(:name, :surname, :email, :phone_number, :password); END;', [
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'password' => Hash::make($request->input('password')),
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.create')->withErrors('Błąd podczas dodawania użytkownika: ' . $e->getMessage());
        }

        return redirect()->route('users.index')->with('success', 'Użytkownik został dodany.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'surname' => 'required|string|max:30',
            'email' => 'required|string|email|max:40|unique:users,email,' . $id,
            'phone_number' => 'required|string|max:9',
            'password' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $password = $request->input('password') ? Hash::make($request->input('password')) : User::findOrFail($id)->password;
            DB::statement('BEGIN UPDATE_USER(:id, :name, :surname, :email, :phone_number, :password); END;', [
                'id' => $id,
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'password' => $password,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.edit', $id)->withErrors('Błąd podczas aktualizacji użytkownika: ' . $e->getMessage());
        }

        return redirect()->route('users.index')->with('success', 'Użytkownik został zaktualizowany.');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            DB::statement('BEGIN DELETE_USER(:id); END;', [
                'id' => $id,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')->withErrors('Błąd podczas usuwania użytkownika: ' . $e->getMessage());
        }

        return redirect()->route('users.index')->with('success', 'Użytkownik został usunięty pomyślnie.');
    }
}
