<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampagneEvaluationController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\RoleController;

// ✅ Rediriger la racine vers l'index des campagnes
Route::get('/', [CampagneEvaluationController::class, 'index'])->name('campagneEvaluation.index');

// ✅ Alias pour accéder à la liste des campagnes
Route::get('/campagnes', [CampagneEvaluationController::class, 'index']);
Route::get('/campagnes/index', [CampagneEvaluationController::class, 'index']);

// ✅ Tableau de bord (protégé par auth)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Routes protégées par authentification

    // 📌 --- Campagnes ---
    
    // Formulaire de création d'une campagne
    Route::get('/campagnes/creation', [CampagneEvaluationController::class, 'create'])->name('campagneEvaluation.creation');

    // Enregistrement d'une nouvelle campagne
    Route::post('/campagnes', [CampagneEvaluationController::class, 'store'])->name('campagneEvaluation.store');

    // Formulaire de modification
    Route::get('/campagnes/modification/{id}', [CampagneEvaluationController::class, 'edit'])->name('campagneEvaluation.modification');

    // Mise à jour d'une campagne
    Route::put('/campagnes/{id}', [CampagneEvaluationController::class, 'update'])->name('campagneEvaluation.update');

    // Suppression d'une campagne
    Route::delete('/campagnes/{id}', [CampagneEvaluationController::class, 'destroy'])->name('campagneEvaluation.suppression');

    // 📌 --- Évaluations ---

    // ✅ Formulaire de création d'une évaluation
    Route::get('/evaluations/creation', [EvaluationController::class, 'create'])->name('evaluation.creation');

    // ✅ Enregistrement d'une nouvelle évaluation
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluation.store');

    // ✅ Liste des évaluations (GET)
    Route::get('/evaluations', [EvaluationController::class, 'index'])->name('evaluation.index');

    // (Optionnel) Modifier une évaluation
    Route::get('/evaluations/modification/{id}', [EvaluationController::class, 'edit'])->name('evaluation.modification');
    Route::put('/evaluations/{id}', [EvaluationController::class, 'update'])->name('evaluation.update');
    Route::delete('/evaluations/{id}', [EvaluationController::class, 'destroy'])->name('evaluation.suppression');

// ✅ Détails d'une campagne accessible à tous (GET)
Route::get('/campagnes/{id}', [CampagneEvaluationController::class, 'show'])->name('campagneEvaluation.details');

// ✅ Détails d'une évaluation (si vous souhaitez le rendre public)
Route::get('/evaluations/{id}', [EvaluationController::class, 'show'])->name('evaluation.details');
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/creation', [RoleController::class, 'create'])->name('roles.creation');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
// Auth routes (login, register, etc.)
require __DIR__.'/auth.php';
