<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        // Stocker des données dans la session
        $request->session()->put('key', 'value');

        return redirect()->back(); // Redirection vers la page précédente
    }

    public function show(Request $request)
    {
        // Récupérer des données de la session
        $value = $request->session()->get('key');
        // ...

        return view('session.show', ['value' => $value]); // Retourner une vue avec les données de la session
    }

    // Autres méthodes pour gérer les sessions...
}
