<?php

namespace App\Http\Controllers;

use App\Models\Objectif;
use Illuminate\Http\Request;

class ObjectifController extends Controller
{
    /**
     * Afficher la liste des objectifs.
     */
    public function index()
    {
        $objectifs = Objectif::all();
        return view('objectifs.index', compact('objectifs'));
    }

    /**
     * Afficher le formulaire de création d'un objectif.
     */
    public function create()
    {
        return view('objectifs.creation');
    }

    /**
     * Enregistrer un nouvel objectif.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ponderation' => 'required|numeric',
        ]);

        Objectif::create($validated);

        return redirect()->route('objectifs.index')->with('success', 'Objectif créé avec succès.');
    }

    /**
     * Afficher le formulaire d'édition d'un objectif.
     */
    public function edit($id)
    {
        $objectif = Objectif::findOrFail($id);
        return view('objectifs.modification', compact('objectif'));
        redirect()->route('objectifs.index')->with('success', 'Objectif mis à jour avec succès.');
    }

    /**
     * Mettre à jour un objectif.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ponderation' => 'required|numeric',
        ]);

        $objectif = Objectif::findOrFail($id);
        $objectif->update($validated);

        return redirect()->route('objectifs.index')->with('success', 'Objectif mis à jour avec succès.');
    }

    /**
     * Supprimer un objectif.
     */
    public function destroy($id)
    {
        $objectif = Objectif::findOrFail($id);
        $objectif->delete();

        return redirect()->route('objectifs.index')->with('success', 'Objectif supprimé avec succès.');
    }

    /**
     * Afficher les détails d'un objectif.
     */
    public function show($id)
    {
        $objectif = Objectif::findOrFail($id);
        return view('objectifs.details', compact('objectif'));
    }
}
