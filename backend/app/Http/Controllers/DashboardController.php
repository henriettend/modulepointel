<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvaluations = Evaluation::count();
        $evaluationsTermines = Evaluation::where('statut', 'terminée')->count();
        $evaluationsEnCours = Evaluation::where('statut', 'en cours')->count();
        $evaluationsAnnules = Evaluation::where('statut', 'annulée')->count();
        $evaluationsEnAttente = Evaluation::where('statut', 'en attente')->count();
        //Calcul du taux de participation
        $employesEvalues = Evaluation::where('statut', 'terminée')->distinct('user_id')->count('user_id');
        $totalUsers = \App\Models\User::count();
        $tauxParticipation = $totalUsers > 0 ? ($employesEvalues/ $totalUsers) * 100 : 0;
        $tauxParticipation = round($tauxParticipation, 2);
        //Le nmbre demployés evalués 
         $employesEvalues = Evaluation::where('statut', 'terminée')->distinct('user_id')->count('user_id');


        return view('welcome', [
            'totalEvaluations' => $totalEvaluations,
            'evaluationsTermines' => $evaluationsTermines,
            'evaluationsEnCours' => $evaluationsEnCours,
            'evaluationsAnnules' => $evaluationsAnnules,
            'evaluationsEnAttente' => $evaluationsEnAttente,
            'tauxParticipation' => $tauxParticipation,
            'employesEvalues' => $employesEvalues,
            'totalUsers' => $totalUsers,
               
        ]);
    }
}
