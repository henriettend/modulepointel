<?php

namespace App\Http\Controllers;

use App\Models\CritereEvaluation;
use Illuminate\Http\Request;

class CritereEvaluationController extends Controller
{
    /**
     * Affiche la liste des critères.
     */
    public function index()
    {
        $criteres = CritereEvaluation::all();
        return view('criteres_evaluation.index', compact('criteres'));
    }

    /**
     * Affiche le formulaire de création d’un critère.
     */
   public function create(Request $request)
{
    $competenceId = $request->competence_id;

    // Vérifier que l'id est présent (optionnel mais conseillé)
    if (!$competenceId) {
        abort(404, "Compétence non spécifiée.");
    }

    // Passer la variable à la vue
    return view('criteres_evaluation.creation', compact('competenceId'));
}

    /**
     * Enregistre un nouveau critère dans la base de données.
     */
  public function store(Request $request)
{
    $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'nullable|string',
        'competence_id' => 'required|exists:competences,id', // très important !
    ]);

    CritereEvaluation::create([
        'titre' => $request->titre,
        'description' => $request->description,
        'competence_id' => $request->competence_id, // <-- C’est ce qui manquait
    ]);

    return redirect()->route('competences.details', $request->competence_id)
                     ->with('success', 'Critère ajouté avec succès !');
}

    /**
     * Affiche le détail d’un critère (optionnel).
     */
   public function show($id)
{
    $critere_evaluation = CritereEvaluation::findOrFail($id);
    return view('criteres_evaluation.details', compact('critere_evaluation'));
}

public function edit($id)
{
    $critere_evaluation = CritereEvaluation::findOrFail($id);
    return view('criteres_evaluation.modification', compact('critere_evaluation'));
}


    /**
     * Met à jour un critère existant.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $critere = CritereEvaluation::findOrFail($id);
        $critere->update([
            'titre' => $request->titre,
            'description' => $request->description,
        ]);

        return redirect()->route('criteres_evaluation.index')->with('success', 'Critère mis à jour avec succès.');
    }

    /**
     * Supprime un critère.
     */
    public function destroy($id)
    {
        $critere = CritereEvaluation::findOrFail($id);
        $critere->delete();

        return redirect()->route('criteres_evaluation.index')->with('success', 'Critère supprimé avec succès.');
    }
}
