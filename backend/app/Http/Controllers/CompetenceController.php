<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
   
    public function index()
{
    $competences = Competence::with('criteres')->get();
    return view('competences.index', compact('competences'));
}


   
    public function create()
    {
        return view('competences.creation');
    }

    
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

   
    public function show(Competence $competence)
    {
        $competence->load('criteres');
        return view('competences.details', compact('competence'));
    }   

   
   
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

    public function destroy(Competence $competence)
    {
        $competence->delete();
        return redirect()->route('competences.index')->with('success', 'Compétence supprimée.');
    }

public function edit($id)
{
    $competence = Competence::with('criteres')->findOrFail($id);
    return view('competences.modification', compact('competence'));
}

    
}
