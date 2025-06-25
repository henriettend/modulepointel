<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    /**
     * Affiche la liste des compétences.
     */
    public function index()
    {
        $competences = Competence::all();
        return view('competences.index', compact('competences'));
    }

    /**
     * Affiche le formulaire de création.
     */
    public function create()
    {
        return view('competences.creation');
    }

    /**
     * Enregistre une nouvelle compétence.
     */
    public function store(Request $request)
    {
        $request->validate([
            'intitule' => 'required|string|max:255',
            'type' => 'required|string',
        ]);

        Competence::create([
            'intitule' => $request->intitule,
            'type' => $request->type,
        ]);

        return redirect()->route('competences.index')->with('success', 'Compétence créée avec succès.');
    }

    /**
     * Affiche une compétence spécifique.
     */
    public function show(Competence $competence)
    {
        return view('competences.details', compact('competence'));
    }

    /**
     * Affiche le formulaire d’édition d’une compétence.
     */
    public function edit(Competence $competence)
    {
        return view('competences.modification', compact('competence'));
    }

    /**
     * Met à jour une compétence existante.
     */
    public function update(Request $request, Competence $competence)
    {
        $request->validate([
            'intitule' => 'required|string|max:255',
            'type' => 'required|string',
        ]);

        $competence->update([
            'intitule' => $request->intitule,
            'type' => $request->type,
        ]);

        return redirect()->route('competences.index')->with('success', 'Compétence mise à jour.');
    }

    /**
     * Supprime une compétence.
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
        return redirect()->route('competences.index')->with('success', 'Compétence supprimée.');
    }
    
}
