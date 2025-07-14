<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use App\Models\CampagneEvaluation;
use App\Models\TypeEvaluation;
use App\Models\Competence;
use Illuminate\Http\Request;
use App\Mail\NotificationEvaluation;
use Illuminate\Support\Facades\Mail;

class EvaluationController extends Controller
{
    // Afficher la liste des évaluations
    public function index()
    {
        $evaluations = Evaluation::with(['user', 'manager', 'campagne'])->get();
        return view('evaluations.index', compact('evaluations'));
    }

    // Formulaire de création d’une évaluation
    public function create()
    {
        $users = User::whereDoesntHave('role', function ($query) {
            $query->whereRaw('LOWER(libelle) = ?', ['manager']);
        })->get();

        $managers = User::whereHas('role', function ($query) {
            $query->whereRaw('LOWER(libelle) = ?', ['manager']);
        })->get();

        $campagnes = CampagneEvaluation::all();
        $types = TypeEvaluation::all();

        return view('evaluations.creation', compact('users', 'managers', 'campagnes', 'types'));
    }

    // Enregistrer une nouvelle évaluation
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
            'campagne_evaluations_id' => 'required|exists:campagne_evaluations,id',
            'type_evaluation_id' => 'required|exists:type_evaluations,id',
        ]);

        $manager = User::with('role')->find($validated['manager_id']);
        if (!$manager || strtolower($manager->role->libelle) !== 'manager') {
            return back()->withErrors(['manager_id' => 'L\'utilisateur sélectionné n\'est pas un manager.'])->withInput();
        }

        $evaluation = Evaluation::create($validated);

        return redirect()->route('evaluations.competences.edit', $evaluation->id)
                         ->with('success', 'Évaluation créée. Veuillez sélectionner les compétences à évaluer.');
    }

    // Afficher les détails d’une évaluation
    public function show($id)
    {
        $evaluation = Evaluation::with([
            'user',
            'manager',
            'campagne',
            'typeEvaluation',
            'competences.criteres'
        ])->findOrFail($id);

        return view('evaluations.details', compact('evaluation'));
    }

    // Formulaire de modification d’une évaluation
    public function edit($id)
    {
        $evaluation = Evaluation::with('competences')->findOrFail($id);

        $users = User::whereDoesntHave('role', function ($query) {
            $query->whereRaw('LOWER(libelle) = ?', ['manager']);
        })->get();

        $managers = User::whereHas('role', function ($query) {
            $query->whereRaw('LOWER(libelle) = ?', ['manager']);
        })->get();

        $campagnes = CampagneEvaluation::all();
        $types = TypeEvaluation::all();
        $competences = Competence::all();

        return view('evaluations.modification', compact('evaluation', 'users', 'managers', 'campagnes', 'types', 'competences'));
    }

    // Mettre à jour une évaluation
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
            'type_evaluation_id' => 'required|exists:type_evaluations,id',
        ]);

        $manager = User::with('role')->find($validated['manager_id']);
        if (!$manager || strtolower($manager->role->libelle) !== 'manager') {
            return back()->withErrors(['manager_id' => 'L\'utilisateur sélectionné n\'est pas un manager.'])->withInput();
        }

        $evaluation->update($validated);

        // ✅ Redirection vers la liste des évaluations
        return redirect()->route('evaluations.index')->with('success', 'Évaluation mise à jour avec succès.');
    }

    // Supprimer une évaluation
    public function destroy($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index')->with('success', 'Évaluation supprimée avec succès.');
    }

    // Formulaire de sélection des compétences
    public function editCompetences($id)
    {
        $evaluation = Evaluation::with('competences')->findOrFail($id);
        $competences = Competence::all();
        $competenceIds = $evaluation->competences->pluck('id')->toArray();

        return view('evaluations.edit_competences', compact('evaluation', 'competences', 'competenceIds'));
    }

    // Mise à jour des compétences associées à une évaluation
    public function updateCompetences(Request $request, $id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $competenceIds = $request->input('competences', []);

        $evaluation->competences()->sync($competenceIds);

        try {
            $this->sendNotificationMail($evaluation->user, $evaluation);
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Erreur lors de l\'envoi de l\'email : ' . $e->getMessage()]);
        }

        return redirect()->route('evaluations.details', $evaluation->id)
                         ->with('success', 'Compétences mises à jour avec succès.');
    }

    // Envoi d’une notification par mail
    public function sendNotificationMail(User $user, Evaluation $evaluation)
    {
        $data = [
            'nom' => $user->prenom . ' ' . $user->nom,
            'titre' => $evaluation->titre,
        ];

        Mail::to($user->email)->send(new NotificationEvaluation($data));
    }
}
