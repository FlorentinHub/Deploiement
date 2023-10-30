<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    protected $fillable = ['nom_collaborateur', 'compte_github', 'contact_courriel', 'degres_implications'];

    public function projets()
    {
        return $this->belongsToMany(Projet::class);
    }
    public function getUsernameFromGitHubLink()
{
    $githubLink = $this->compte_github;
    
    // Utilise une expression régulière pour extraire le nom d'utilisateur
    preg_match('/github\.com\/([^\/]+)$/', $githubLink, $matches);

    if (count($matches) > 1) {
        // Le nom d'utilisateur est dans le deuxième élément du tableau des correspondances
        return $matches[1];
    }

    // Retourne une chaîne vide si le lien n'est pas valide
    return '';
}

}
