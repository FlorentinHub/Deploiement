<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Collaborateur;
use App\Http\Controllers\CollaborateurController;
use Illuminate\Support\Facades\Storage;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::all(); // Récupére tous les projets depuis la base de données
        return $projets;
    }
    public function create()
    {
        $collaborateursController = new CollaborateurController();
        $mesCollaborateurs = $collaborateursController->index();
        return view('ajoutProjet', ['collaborateurs' => $mesCollaborateurs]);
    }
    public function update(Request $request, $id)
    {
        $projet = Projet::findOrFail($id);

        $validatedData = $request->validate([
            'nom_projet' => 'required',
            'type_projet' => 'required',
            'complexite' => 'required|integer',
            'pourcentage_complet' => 'required|integer',
            'lien_github' => 'url|nullable',
            'description' => 'nullable',
        ]);

        $projet->update($validatedData);

        return redirect()->route('accueil')->with('success', 'Le projet a été modifié avec succès.');
    }


    public function uploadImage(Request $request, $id)
    {
        // Valider le fichier image téléchargé
        $request->validate([
            'image_projet' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Exemple : Max 2MB
        ]);

        // Vérifier si le projet existe
        $projet = Projet::find($id);

        if (!$projet) {
            // Gérer le cas où le projet n'existe pas
            return redirect()->back()->with('error', 'Projet non trouvé.');
        }

        // Télécharger l'image et la stocker
        $image = $request->file('image_projet');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images/projets'), $imageName);

        // Mettre à jour le champ image du projet
        $projet->image_projet = $imageName; // Utilisez 'image_projet' au lieu de 'image'
        $projet->save();

        return redirect()->back()->with('success', 'Image du projet mise à jour.');
    }


    public function addCollaborator($projetId, $collaboratorId)
    {
        // Valider l'existence du projet et du collaborateur
        $projet = Projet::find($projetId);
        $collaborator = Collaborateur::find($collaboratorId);

        if (!$projet || !$collaborator) {
            // Gérer le cas où le projet ou le collaborateur n'existe pas
            return redirect()->back()->with('error', 'Projet ou collaborateur non trouvé.');
        }

        // Ajouter le collaborateur au projet (assurez-vous d'avoir correctement configuré la relation)
        $projet->collaborators()->attach($collaborator);

        return redirect()->back()->with('success', 'Collaborateur ajouté au projet.');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_projet' => 'required',
            'type_projet' => 'required',
            'complexite' => 'required|integer',
            'pourcentage_complet' => 'required|integer',
            'lien_github' => 'url|nullable',
            'description' => 'nullable',
            'image_projet' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'collaborateurs' => 'array',
        ]);

        if ($request->hasFile('image_projet')) {
            $imagePath = $request->file('image_projet');
            $imageName = $imagePath->hashName();
            
            Storage::disk('public')->put('images', $imagePath);
            dd($imageName);
            $validatedData['image_projet'] = $imageName;
        }

        $projet = Projet::create($validatedData);

        // Lier des collaborateurs au projet si des collaborateurs sont sélectionnés
        if ($request->has('collaborateurs')) {
            $projet->collaborateurs()->attach($request->input('collaborateurs'));
        }

        return redirect('/');
    }

    public function details($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projet', compact('projet'));
    }

    public function show($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.show', compact('projet'));
    }

    public function edit($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.edit', compact('projet'));
    }
    public function confirmDelete($id)
    {
        $projet = Projet::findOrFail($id);
        return view('projets.confirm-delete', compact('projet'));
    }

    public function destroy($id)
    {
        $projet = Projet::findOrFail($id);
        $projet->collaborateurs()->detach();
        $projet->delete();
        return redirect()->route('accueil')->with('success', 'Le projet a été supprimé avec succès.');
    }
}
