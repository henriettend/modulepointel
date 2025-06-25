<?php

namespace App\Http\Controllers;

use App\Models\GrilleEvaluation;
use App\Models\CampagneEvaluation;
use Illuminate\Http\Request;

class GrilleEvaluationController extends Controller
{
    public function index()
    {
        $grilles = GrilleEvaluation::with('campagne')->get();
        return view('grilles.index', compact('grilles'));
    }

    public function create()
    {
        $campagnes = CampagneEvaluation::all();
        return view('grilles.creation', compact('campagnes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'campagne_evaluations_id' => 'required|exists:campagne_evaluations,id',
        ]);

        GrilleEvaluation::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'campagne_evaluations_id' => $request->campagne_evaluations_id,
        ]);

        return redirect()->route('grilles.index')->with('success', 'Grille créée avec succès.');
    }

    public function edit($id)
    {
        $grille = GrilleEvaluation::findOrFail($id);
        $campagnes = CampagneEvaluation::all();
        return view('grilles.modification', compact('grille', 'campagnes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'campagne_evaluations_id' => 'required|exists:campagne_evaluations,id',
        ]);

        $grille = GrilleEvaluation::findOrFail($id);
        $grille->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'campagne_evaluations_id' => $request->campagne_evaluations_id,
        ]);

        return redirect()->route('grilles.index')->with('success', 'Grille mise à jour avec succès.');
    }

    public function suppression($id)
    {
        $grille = GrilleEvaluation::findOrFail($id);
        $grille->delete();

        return redirect()->route('grilles.index')->with('success', 'Grille supprimée avec succès.');
    }
}
