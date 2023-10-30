<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_projet',
        'type_projet',
        'complexite',
        'pourcentage_complet',
        'lien_github',
        'description',
        'image_projet',
    ];
    public function collaborateurs(): BelongsToMany
    {
        return $this->belongsToMany(Collaborateur::class);
    }
    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }
}
