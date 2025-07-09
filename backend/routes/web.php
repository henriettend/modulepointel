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
use App\Models\Evaluation;
use App\Mail\NotificationEvaluation;
use Illuminate\Support\Facades\Mail;

// Page de connexion affichée par défaut quand on visite le site
Route::get('/', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/connexion', [AuthenticatedSessionController::class, 'store'])->name('login.post');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        // Récupération des statistiques
        $totalEvaluations = Evaluation::count();
        $evaluationsTermines = Evaluation::where('statut', 'terminée')->count();
        $evaluationsEnCours = Evaluation::where('statut', 'en cours')->count();
        $evaluationsAnnules = Evaluation::where('statut', 'annulée')->count();  
        $evaluationsEnAttente = Evaluation::where('statut', 'en attente')->count();
        // Calcul du taux de participation
        $employesEvalues = Evaluation::where('statut', 'terminée')->distinct('user_id')->count('user_id');
        $totalUsers = \App\Models\User::count();
        $tauxParticipation = $totalUsers > 0 ? ($employesEvalues / $totalUsers) * 100 : 0;
        $tauxParticipation = round($tauxParticipation, 2);

        return view('welcome', compact(
            'totalEvaluations',
            'evaluationsTermines',
            'evaluationsEnCours',
            'evaluationsAnnules',
            'evaluationsEnAttente',
            'tauxParticipation'
            ,'employesEvalues',
            'totalUsers'

            

        ));
    })->name('dashboard');

    // Campagnes d'Évaluation
    Route::resource('campagnes', CampagneEvaluationController::class)->names([
        'index' => 'campagneEvaluation.index',
        'create' => 'campagneEvaluation.creation',
        'store' => 'campagneEvaluation.store',
        'edit' => 'campagneEvaluation.modification',
        'update' => 'campagneEvaluation.update',
        'destroy' => 'campagneEvaluation.suppression',
        'show' => 'campagneEvaluation.details',
    ]);

    // Types d'Évaluation
    Route::resource('type_evaluations', TypeEvaluationController::class)->names([
        'index' => 'type_evaluations.index',
        'create' => 'type_evaluations.creation',
        'store' => 'type_evaluations.store',
        'edit' => 'type_evaluations.modification',
        'update' => 'type_evaluations.update',
        'destroy' => 'type_evaluations.suppression',
        'show' => 'type_evaluations.details',
    ]);

    // Évaluations
    Route::resource('evaluations', EvaluationController::class)->names([
        'index' => 'evaluations.index',
        'create' => 'evaluations.creation',
        'store' => 'evaluations.store',
        'edit' => 'evaluations.modification',
        'update' => 'evaluations.update',
        'destroy' => 'evaluations.suppression',
        'show' => 'evaluations.details',
    ]);

    // Gestion des compétences associées à une évaluation
    Route::get('/evaluations/{id}/competences', [EvaluationController::class, 'editCompetences'])->name('evaluations.competences.edit');
    Route::post('/evaluations/{id}/competences', [EvaluationController::class, 'updateCompetences'])->name('evaluations.competences.update');
    Route::put('/evaluations/{id}/competences', [EvaluationController::class, 'updateCompetences']);

    // Rôles
    Route::resource('roles', RoleController::class)->names([
        'index' => 'roles.index',
        'create' => 'roles.creation',
        'store' => 'roles.store',
        'edit' => 'roles.modification',
        'update' => 'roles.update',
        'destroy' => 'roles.suppression',
        'show' => 'roles.details',
    ]);

    // Utilisateurs
    Route::resource('users', UserController::class)->names([
        'index' => 'user.index',
        'create' => 'user.creation',
        'store' => 'user.store',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'destroy' => 'user.destroy',
    ]);
    Route::get('/users/{id}/details', [UserController::class, 'details'])->name('user.details');

    // Objectifs
    Route::resource('objectifs', ObjectifController::class)->names([
        'index' => 'objectifs.index',
        'create' => 'objectifs.creation',
        'store' => 'objectifs.store',
        'edit' => 'objectifs.modification',
        'update' => 'objectifs.update',
        'destroy' => 'objectifs.destroy',
        'show' => 'objectifs.details',
    ]);

    // Compétences
    Route::resource('competences', CompetenceController::class)->names([
        'index' => 'competences.index',
        'create' => 'competences.create',
        'store' => 'competences.store',
        'edit' => 'competences.modification',
        'update' => 'competences.update',
        'destroy' => 'competences.suppression',
        'show' => 'competences.details',
    ]);

    // Grilles d'Évaluation
    Route::resource('grilles', GrilleEvaluationController::class)->names([
        'index' => 'grilleEvaluation.index',
        'create' => 'grilleEvaluation.creation',
        'store' => 'grilleEvaluation.store',
        'edit' => 'grilleEvaluation.modification',
        'update' => 'grilleEvaluation.update',
        'destroy' => 'grilleEvaluation.suppression',
        'show' => 'grilleEvaluation.details',
    ]);

    // Critères d'Évaluation
    Route::resource('critere_evaluation', CritereEvaluationController::class)->names([
        'index' => 'criteres_evaluation.index',
        'create' => 'criteres_evaluation.creation',
        'store' => 'criteres_evaluation.store',
        'edit' => 'criteres_evaluation.modification',
        'update' => 'criteres_evaluation.update',
        'destroy' => 'criteres_evaluation.suppression',
        'show' => 'criteres_evaluation.details',
    ]);

    // Profil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // ✅ Route de test mail
    Route::get('/test-mail', function () {
        $user = \App\Models\User::first();
        $evaluation = \App\Models\Evaluation::first();

        if (!$user || !$evaluation) {
            return response('Pas assez de données pour tester.', 404);
        }

        $data = [
            'nom' => $user->prenom . ' ' . $user->nom,
            'titre' => $evaluation->titre,
        ];

        try {
            Mail::to($user->email)->send(new NotificationEvaluation($data));
        } catch (\Exception $e) {
            return response('Erreur lors de l\'envoi du mail : ' . $e->getMessage(), 500);
        }

        return 'Mail envoyé (ou en file d’attente) à ' . $user->email;
    });

});

require __DIR__.'/auth.php';
