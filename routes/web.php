<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampagneEvaluationController;

// Rediriger la racine vers l'index des campagnes
Route::get('/', [CampagneEvaluationController::class, 'index'])->name('campagneEvaluation.index');

// Autres accès vers l'index des campagnes (alias)
Route::get('/campagnes', [CampagneEvaluationController::class, 'index']);
Route::get('/campagnes/index', [CampagneEvaluationController::class, 'index']);

// Tableau de bord
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authentification requise pour les routes suivantes
Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Formulaire de création d'une campagne
    Route::get('/campagnes/creation', [CampagneEvaluationController::class, 'create'])->name('campagneEvaluation.creation');

    // Enregistrement d'une nouvelle campagne
    Route::post('/campagnes', [CampagneEvaluationController::class, 'store'])->name('campagneEvaluation.store');

    // Formulaire de modification (⚠️ nom corrigé : `edit`)
    Route::get('/campagnes/modification/{id}', [CampagneEvaluationController::class, 'edit'])->name('campagneEvaluation.modification');

    // Mise à jour d'une campagne
    Route::put('/campagnes/{id}', [CampagneEvaluationController::class, 'update'])->name('campagneEvaluation.update');

    // Suppression d'une campagne (⚠️ nom corrigé : `destroy`)
    Route::delete('/campagnes/{id}', [CampagneEvaluationController::class, 'destroy'])->name('campagneEvaluation.suppression');
});

// Détails d'une campagne (accessible à tous)
Route::get('/campagnes/{id}', [CampagneEvaluationController::class, 'show'])->name('campagneEvaluation.details');

// Routes d'authentification (login, register...)
require __DIR__.'/auth.php';
