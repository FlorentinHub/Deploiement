<?php

namespace App\Http\Controllers;


use App\Models\Projet;
use App\Models\Collaborateur;

class AdminController extends Controller
{
    public function dashboard()
    {
        
        $projetController = new ProjetController();
        $projets = $projetController->index();
        $nombreDeProjets = Projet::count();
        $nombreDeCollaborateurs = Collaborateur::count();
        $projets = Projet::all();

        // Envoi des données à la vue
        return view('admin.dashboard', compact('nombreDeProjets', 'nombreDeCollaborateurs','projets'));
    }
}
