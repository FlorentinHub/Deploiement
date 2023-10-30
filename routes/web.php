<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetController;
use App\Http\Controllers\CollaborateurController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\LocalizationController;

Route::get('lang/switch/{locale}', [LocalizationController::class, 'index'])->name('lang.switch');
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');

// La route pour la page de renvoi du courriel de confirmation
// Seuls les utilisateurs vérifiés peuvent accéder aux routes suivantes

Route::get('/projet/{id}', [ProjetController::class, 'details'])->name('projet.details');
Route::get('/', [AccueilController::class, 'index'])->name('accueil');



Route::get('/ajouter-projet', [ProjetController::class, 'index']);
Route::get('/ajouter-projet', [ProjetController::class, 'create']);
Route::post('/projet', [ProjetController::class, 'store']);

Route::get('/projects', [AccueilController::class, 'showProjects']);

Auth::routes(['verify' => true]);
Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//MODIFIER
Route::get('/projet/{id}/edit', [ProjetController::class, 'edit'])->name('projet.edit');
Route::put('/projet/{id}', [ProjetController::class, 'update'])->name('projet.update');
//SUPPRIMER
Route::get('/projet/{id}/confirm-delete', [ProjetController::class, 'confirmDelete'])->name('projet.confirmDelete');
//DESTROY
Route::delete('/projet/{id}', [ProjetController::class, 'destroy'])->name('projet.destroy');

//Collaborateurs:
Route::get('/ajouter-collaborateur', [CollaborateurController::class, 'create'])->name('ajouter-collaborateur')->middleware('checkadmin');
Route::post('/ajouter-collaborateur', [CollaborateurController::class, 'store']);


Route::get('/projet/{id}', [ProjetController::class, 'details'])->name('projet.details');
