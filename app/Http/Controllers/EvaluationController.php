<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use App\Models\CampagneEvaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    // Liste toutes les évaluations
    public function index()
    {
        $evaluations = Evaluation::with(['user', 'manager', 'campagne'])->get();
        return view('evaluations.index', compact('evaluations'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        // Utilisateurs sans rôle manager
        $users = User::whereDoesntHave('role', function ($query) {
            $query->where('libelle', 'manager');
        })->get();

        // Utilisateurs avec rôle manager
        $managers = User::whereHas('role', function ($query) {
            $query->where('libelle', 'manager');
        })->get();

        $campagnes = CampagneEvaluation::all();

        return view('evaluations.creation', compact('users', 'managers', 'campagnes'));
    }

    // Enregistre une évaluation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'statut' => 'required|string|in:en attente,en cours,terminée,annulée',
            'manager_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id|different:manager_id',
            'campagne_evaluations_id' => 'nullable|exists:campagne_evaluations,id',
        ]);

        // Vérifie que le manager a bien le rôle 'manager'
        $manager = User::with('role')->find($validated['manager_id']);
        if (!$manager || $manager->role->libelle !== 'manager') {
            return back()->withErrors(['manager_id' => 'L\'utilisateur sélectionné n\'est pas un manager.'])->withInput();
        }

        Evaluation::create($validated);

        return redirect()->route('evaluations.index')->with('success', 'Évaluation créée avec succès.');
    }

    // Affiche une évaluation spécifique
    public function show($id)
    {
        $evaluation = Evaluation::with(['user', 'manager', 'campagne'])->findOrFail($id);
        return view('evaluations.show', compact('evaluation'));
    }

    // Formulaire d'édition
    public function edit($id)
    {
        $evaluation = Evaluation::findOrFail($id);

        // Utilisateurs sans rôle manager
        $users = User::whereDoesntHave('role', function ($query) {
            $query->where('libelle', 'manager');
        })->get();

        // Utilisateurs avec rôle manager
        $managers = User::whereHas('role', function ($query) {
            $query->where('libelle', 'manager');
        })->get();

        $campagnes = CampagneEvaluation::all();

        return view('evaluations.modification', compact('evaluation', 'users', 'managers', 'campagnes'));
    }

    // Mise à jour
    public function update(Request $request, $id)
    {
        $evaluation = Evaluation::findOrFail($id);

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'statut' => 'required|string|in:en attente,en cours,terminée,annulée',
            'manager_id' => 'required|exists:users,id',
            'user_id' => 'required|exists:users,id|different:manager_id',
            'campagne_evaluations_id' => 'nullable|exists:campagne_evaluations,id',
        ]);

        $manager = User::with('role')->find($validated['manager_id']);
        if (!$manager || $manager->role->libelle !== 'manager') {
            return back()->withErrors(['manager_id' => 'L\'utilisateur sélectionné n\'est pas un manager.'])->withInput();
        }

        $evaluation->update($validated);

        return redirect()->route('evaluations.index')->with('success', 'Évaluation mise à jour avec succès.');
    }

    // Suppression
    public function destroy($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index')->with('success', 'Évaluation supprimée avec succès.');
    }
}
