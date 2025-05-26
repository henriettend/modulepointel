<?php

namespace App\Http\Controllers;

use App\Models\CampagneEvaluation;
use Illuminate\Http\Request;

class CampagneEvaluationController extends Controller
{
    // Afficher la liste des campagnes
    public function index()
    {
        $campagnes = CampagneEvaluation::all();
        return view('campagneEvaluation.index', compact('campagnes'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('campagneEvaluation.creation');
    }

    // Enregistrer une nouvelle campagne
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'statut' => 'required|string|max:50',
        ]);

        CampagneEvaluation::create($validated);

        return redirect()->route('campagneEvaluation.index')
                         ->with('success', 'Campagne créée avec succès.');
    }

    // Afficher les détails d'une campagne
    public function show($id)
    {
        $campagne = CampagneEvaluation::findOrFail($id);
        return view('campagneEvaluation.details', compact('campagne'));
    }

    // Afficher le formulaire de modification
    public function edit($id)
    {
        $campagne = CampagneEvaluation::findOrFail($id);
        return view('campagneEvaluation.modification', compact('campagne'));
    }

    // Mettre à jour une campagne
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'type' => 'required|string|max:50',
            'description' => 'required|string',
            'dateDebut' => 'required|date',
            'dateFin' => 'required|date|after_or_equal:dateDebut',
            'statut' => 'required|string|max:50',
        ]);

        $campagne = CampagneEvaluation::findOrFail($id);
        $campagne->update($validated);

        return redirect()->route('campagneEvaluation.index')
                         ->with('success', 'Campagne mise à jour avec succès.');
    }

    // Supprimer une campagne
    public function destroy($id)
    {
        $campagne = CampagneEvaluation::findOrFail($id);
        $campagne->delete();

        return redirect()->route('campagneEvaluation.index')
                         ->with('success', 'Campagne supprimée avec succès.');
    }
}
