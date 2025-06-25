<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CampagneEvaluationController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\CritereEvaluationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\GrilleEvaluationController;
use App\Http\Controllers\HistoriqueController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ObjectifController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TypeEvaluationController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Routes publiques (connexion, déconnexion)
|--------------------------------------------------------------------------
*/

// Page de connexion affichée par défaut quand on visite le site
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/connexion', [AuthenticatedSessionController::class, 'store'])->name('login.post');

/*
|--------------------------------------------------------------------------
| Routes protégées par authentification
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // Tableau de bord
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard.index');

    // Campagnes d'Évaluation
    Route::get('/campagnes/index', [CampagneEvaluationController::class, 'index'])->name('campagneEvaluation.index');
    Route::get('/campagnes/creation', [CampagneEvaluationController::class, 'create'])->name('campagneEvaluation.creation');
    Route::post('/campagnes', [CampagneEvaluationController::class, 'store'])->name('campagneEvaluation.store');
    Route::get('/campagnes/modification/{id}', [CampagneEvaluationController::class, 'edit'])->name('campagneEvaluation.modification');
    Route::put('/campagnes/{id}', [CampagneEvaluationController::class, 'update'])->name('campagneEvaluation.update');
    Route::delete('/campagnes/{id}', [CampagneEvaluationController::class, 'destroy'])->name('campagneEvaluation.suppression');
    Route::get('/campagnes/details/{id}', [CampagneEvaluationController::class, 'show'])->name('campagneEvaluation.details');

    // Types d'Évaluation
    Route::get('/type_evaluations/index', [TypeEvaluationController::class, 'index'])->name('type_evaluations.index');
    Route::get('/type_evaluations/creation', [TypeEvaluationController::class, 'creation'])->name('type_evaluations.creation');
    Route::post('/type_evaluations', [TypeEvaluationController::class, 'store'])->name('type_evaluations.store');
    Route::get('/type_evaluations/modification/{id}', [TypeEvaluationController::class, 'modification'])->name('type_evaluations.modification');
    Route::put('/type_evaluations/{id}', [TypeEvaluationController::class, 'update'])->name('type_evaluations.update');
    Route::delete('/type_evaluations/{id}', [TypeEvaluationController::class, 'destroy'])->name('type_evaluations.suppression');
    Route::get('/type_evaluations/details/{id}', [TypeEvaluationController::class, 'details'])->name('type_evaluations.details');

    // Évaluations
    Route::get('/evaluations/index', [EvaluationController::class, 'index'])->name('evaluations.index');
    Route::get('/evaluations/creation', [EvaluationController::class, 'create'])->name('evaluations.creation');
    Route::post('/evaluations', [EvaluationController::class, 'store'])->name('evaluations.store');
    Route::get('/evaluations/details/{id}', [EvaluationController::class, 'show'])->name('evaluations.details');
    Route::get('/evaluations/modification/{id}', [EvaluationController::class, 'edit'])->name('evaluations.modification');
    Route::put('/evaluations/{id}', [EvaluationController::class, 'update'])->name('evaluations.update');
    Route::delete('/evaluations/{id}', [EvaluationController::class, 'destroy'])->name('evaluations.suppression');

    // Rôles
    Route::resource('/roles', RoleController::class)->names([
        'index' => 'roles.index',
        'create' => 'roles.creation',
        'store' => 'roles.store',
        'edit' => 'roles.edit',
        'update' => 'roles.update',
        'destroy' => 'roles.destroy',
        'show' => 'roles.show',
    ]);

    // Utilisateurs
    Route::resource('/users', UserController::class)->names([
        'index' => 'user.index',
        'create' => 'user.creation',
        'store' => 'user.store',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'destroy' => 'user.destroy',
    ]);
    Route::get('/users/{id}/details', [UserController::class, 'details'])->name('user.details');

    // Objectifs
    Route::resource('/objectifs', ObjectifController::class)->names([
        'index' => 'objectifs.index',
        'create' => 'objectifs.creation',
        'store' => 'objectifs.store',
        'edit' => 'objectifs.modification',
        'update' => 'objectifs.update',
        'destroy' => 'objectifs.destroy',
    ]);
    Route::get('/objectifs/details/{id}', [ObjectifController::class, 'show'])->name('objectifs.details');

    // Compétences
    Route::resource('/competences', CompetenceController::class)->names([
        'index' => 'competences.index',
        'create' => 'competences.create',
        'store' => 'competences.store',
        'edit' => 'competences.modification',
        'update' => 'competences.update',
        'destroy' => 'competences.suppression',
        'show' => 'competences.details',
    ]);

    // Grilles d'Évaluation
    Route::resource('/grilles', GrilleEvaluationController::class)->names([
        'index' => 'grilleEvaluation.index',
        'create' => 'grilleEvaluation.creation',
        'store' => 'grilleEvaluation.store',
        'edit' => 'grilleEvaluation.modification',
        'update' => 'grilleEvaluation.update',
        'destroy' => 'grilleEvaluation.suppression',
    ]);
    Route::get('/grilles/details/{id}', [GrilleEvaluationController::class, 'details'])->name('grilleEvaluation.details');

    // Profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

// Auth routes (inscription, mot de passe, etc.)
require __DIR__.'/auth.php';
