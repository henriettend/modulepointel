<?php

namespace App\Http\Controllers;

use App\Models\TypeEvaluation;
use Illuminate\Http\Request;

class TypeEvaluationController extends Controller
{
    // Affiche la liste des types d'évaluation
    public function index()
    {
        $types = TypeEvaluation::all();
        return view('type_evaluations.index', compact('types'));
    }

    // Affiche le formulaire de création
    public function creation()
    {
        return view('type_evaluations.creation');
    }

    // Enregistre un nouveau type d'évaluation
    public function store(Request $request)
    {
        $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        TypeEvaluation::create([
            'intitule' => $request->intitule,
            'description' => $request->description,
        ]);

        return redirect()->route('type_evaluations.index')->with('success', 'Type d\'évaluation créé avec succès.');
    }

    // Affiche le formulaire de modification
    public function modification($id)
    {
        $typeEvaluation = TypeEvaluation::findOrFail($id);
        return view('type_evaluations.modification', compact('typeEvaluation'));
    }

    // Met à jour un type d'évaluation
    public function update(Request $request, $id)
    {
        $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $type = TypeEvaluation::findOrFail($id);
        $type->update([
            'intitule' => $request->intitule,
            'description' => $request->description,
        ]);

        return redirect()->route('type_evaluations.index')->with('success', 'Type d\'évaluation mis à jour avec succès.');
    }

    // Supprime un type d'évaluation
public function destroy($id)
{
    $type = TypeEvaluation::findOrFail($id);
    $type->delete();

    return redirect()->route('type_evaluations.index')->with('success', 'Type d\'évaluation supprimé avec succès.');
}


    // Affiche les détails d’un type d’évaluation
    public function details($id)
    {
        $typeEvaluation = TypeEvaluation::findOrFail($id);
        return view('type_evaluations.details', compact('typeEvaluation'));
    }
}
