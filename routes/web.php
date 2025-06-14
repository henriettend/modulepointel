<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CampagneEvaluationController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\CritereEvaluationController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TypeEvaluationController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrilleEvaluationController;
use App\Http\Controllers\CompetenceController;

// ==========================
// Accueil & Dashboard
// ==========================
Route::get('/', [CampagneEvaluationController::class, 'index'])->name('campagneEvaluation.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ==========================
// Campagnes d'Évaluation
// ==========================
Route::get('/campagnes', [CampagneEvaluationController::class, 'index']);
Route::get('/campagnes/index', [CampagneEvaluationController::class, 'index']);
Route::get('/campagnes/creation', [CampagneEvaluationController::class, 'create'])->name('campagneEvaluation.creation');
Route::post('/campagnes', [CampagneEvaluationController::class, 'store'])->name('campagneEvaluation.store');
Route::get('/campagnes/modification/{id}', [CampagneEvaluationController::class, 'edit'])->name('campagneEvaluation.modification');
Route::put('/campagnes/{id}', [CampagneEvaluationController::class, 'update'])->name('campagneEvaluation.update');
Route::delete('/campagnes/{id}', [CampagneEvaluationController::class, 'destroy'])->name('campagneEvaluation.suppression');
Route::get('/campagnes/details/{id}', [CampagneEvaluationController::class, 'show'])->name('campagneEvaluation.details');

// ==========================
// Évaluations
// ==========================
Route::get('evaluations/index', [EvaluationController::class, 'index'])->name('evaluations.index');

Route::get('/evaluations/creation', [EvaluationController::class, 'create'])->name('evaluations.creation');
Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
Route::get('/evaluations/details/{id}', [EvaluationController::class, 'show'])->name('evaluations.details');
Route::get('/evaluations/modification/{id}', [EvaluationController::class, 'edit'])->name('evaluations.modification');
Route::put('/evaluations/{id}', [EvaluationController::class, 'update'])->name('evaluations.update');
Route::delete('/evaluations/{id}', [EvaluationController::class, 'destroy'])->name('evaluations.suppression');

// ==========================
// Rôles
// ==========================
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/roles/creation', [RoleController::class, 'create'])->name('roles.creation');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('/roles/{role}', [RoleController::class, 'show'])->name('roles.show');

// ==========================
// Utilisateurs
// ==========================
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.creation');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{id}/details', [UserController::class, 'details'])->name('user.details');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');

// ==========================
// Objectifs
// ==========================
Route::get('/objectifs', [ObjectifController::class, 'index'])->name('objectifs.index');
Route::get('/objectifs/creation', [ObjectifController::class, 'create'])->name('objectifs.creation');
Route::post('/objectifs', [ObjectifController::class, 'store'])->name('objectifs.store');
Route::get('/objectifs/modification/{id}', [ObjectifController::class, 'edit'])->name('objectifs.modification');
Route::put('/objectifs/{id}', [ObjectifController::class, 'update'])->name('objectifs.update');
Route::delete('/objectifs/{id}', [ObjectifController::class, 'destroy'])->name('objectifs.destroy');
Route::get('/objectifs/details/{id}', [ObjectifController::class, 'show'])->name('objectifs.details');

// ==========================
// Compétences
// ==========================
Route::get('/competences', [CompetenceController::class, 'index'])->name('competences.index');
Route::get('/competences/create', [CompetenceController::class, 'create'])->name('competences.create');
Route::post('/competences', [CompetenceController::class, 'store'])->name('competences.store');
Route::get('/competences/{competence}', [CompetenceController::class, 'show'])->name('competences.details');
Route::get('/competences/{competence}/edit', [CompetenceController::class, 'edit'])->name('competences.modification');
Route::put('/competences/{competence}', [CompetenceController::class, 'update'])->name('competences.update');
Route::delete('/competences/{competence}', [CompetenceController::class, 'destroy'])->name('competences.destroy');

// ==========================
// Grilles d'Évaluation
// ==========================
Route::get('/grilles', [GrilleEvaluationController::class, 'index'])->name('grilleEvaluation.index');

Route::get('/grilles/creation', [GrilleEvaluationController::class, 'create'])->name('grilleEvaluation.creation');

Route::post('/grilles', [GrilleEvaluationController::class, 'store'])->name('grilleEvaluation.store');


// ==========================
// Authentification
// ==========================
require __DIR__.'/auth.php';
