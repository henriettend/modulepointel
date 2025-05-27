<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    // Affiche la liste des évaluations de l'utilisateur connecté
    public function index()
    {
        $evaluations = Evaluation::where('user_id', Auth::id())->get();
        return view('evaluation.index', compact('evaluations'));
    }

    // Affiche le formulaire de création d'une évaluation
    public function create()
    {
        return view('evaluation.creation');
    }

    // Enregistre une nouvelle évaluation
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'statut' => 'required|string|max:50',
            'manager_id' => 'nullable|exists:users,id',
            'campagne_evaluations_id' => 'nullable|exists:campagne_evaluations,id',
        ]);

        $validated['user_id'] = Auth::id(); // Ajout automatique de l’utilisateur connecté

        Evaluation::create($validated);

        return redirect()->route('evaluations.index')->with('success', 'Évaluation créée avec succès.');
    }

    // Affiche les détails d'une évaluation
    public function show($id)
    {
        $evaluation = Evaluation::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('evaluation.show', compact('evaluation'));
    }

    // Affiche le formulaire d'édition d'une évaluation
    public function edit($id)
    {
        $evaluation = Evaluation::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('evaluation.edit', compact('evaluation'));
    }

    // Met à jour une évaluation
    public function update(Request $request, $id)
    {
        $evaluation = Evaluation::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'statut' => 'required|string|max:50',
            'manager_id' => 'nullable|exists:users,id',
            'campagne_evaluations_id' => 'nullable|exists:campagne_evaluations,id',
        ]);

        $evaluation->update($validated);

        return redirect()->route('evaluations.index')->with('success', 'Évaluation mise à jour avec succès.');
    }

    // Supprime une évaluation
    public function destroy($id)
    {
        $evaluation = Evaluation::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $evaluation->delete();

        return redirect()->route('evaluations.index')->with('success', 'Évaluation supprimée avec succès.');
    }
}
