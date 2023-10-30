<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjetController;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $projetController = new ProjetController();
        $projets = $projetController->index();
        return view('accueil', ['projets' => $projets]);
    }
    public function showProjects()
    {
        $projetController = new ProjetController();
        $projets = $projetController->index();
        return view('showProjects', ['projets' => $projets]);
    }
}
