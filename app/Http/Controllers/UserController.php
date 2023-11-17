<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Afficher tous les utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', ['users' => $users]);
    }

    // Afficher le formulaire pour modifier un utilisateur spécifique
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }

    // Afficher un utilisateur spécifique
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }
        return response()->json(['user' => $user]);
    }

    // Enregistrer un nouvel utilisateur
    public function store(Request $request)
    {
        // Validation des données reçues
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        // Création d'un nouvel utilisateur
        $user = User::create($request->all());

        return response()->json(['user' => $user], 201);
    }

    // Mettre à jour un utilisateur spécifique
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->input('isAdmin')) {
            $user->isAdmin = 1;
        } else {
            $user->isAdmin = 0;
        }

        $user->save();

        return redirect('/users');
    }

    // Supprimer un utilisateur spécifique
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users');
    }
}
