<?php

namespace App\Http\Controllers;

use App\Models\Collaborateur;
use Illuminate\Http\Request;

class CollaborateurController extends Controller
{public function index()
    {
        $collaborateurs = Collaborateur::all();
        return $collaborateurs;
    }

    public function create()
    {
        return view('collaborateurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_collaborateur' => 'required',
            'compte_github' => 'required',
            'contact_courriel' => 'required|email',
            'degres_implications' => 'required',
        ]);
    
        Collaborateur::create($request->all());
    
        return redirect()->route('accueil')->with('success', 'Collaborateur ajouté avec succès.');
    }

    public function show($id)
    {
        $collaborateur = Collaborateur::findOrFail($id);
        return view('collaborateurs.show', compact('collaborateur'));
    }

    public function edit($id)
    {
        $collaborateur = Collaborateur::findOrFail($id);
        return view('collaborateurs.edit', compact('collaborateur'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom_collaborateur' => 'required',
            'compte_github' => 'required',
            'contact_courriel' => 'required|email',
            'degres_implications' => 'required|in:Faible,Normal,Haut', // Valider que la valeur est l'une des options
        ]);
    
        $collaborateur = Collaborateur::findOrFail($id);
        $collaborateur->update([
            'nom_collaborateur' => $request->input('nom_collaborateur'),
            'compte_github' => $request->input('compte_github'),
            'contact_courriel' => $request->input('contact_courriel'),
            'degres_implications' => $request->input('degres_implications'),
        ]);
    
        return redirect()->route('collaborateur.index')->with('success', 'Collaborateur mis à jour avec succès.');
    }
    

    public function destroy($id)
    {
        $collaborateur = Collaborateur::findOrFail($id);
        $collaborateur->delete();

        return redirect()->route('collaborateur.index')->with('success', 'Collaborateur supprimé avec succès.');
    }
}