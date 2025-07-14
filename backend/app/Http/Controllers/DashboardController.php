<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // ================================
        // 1. Statistiques globales
        // ================================
        $totalEvaluations = Evaluation::count();
        $evaluationsTermines = Evaluation::where('statut', 'terminée')->count();
        $evaluationsEnCours = Evaluation::where('statut', 'en cours')->count();
        $evaluationsAnnules = Evaluation::where('statut', 'annulée')->count();
        $evaluationsEnAttente = Evaluation::where('statut', 'en attente')->count();

        $employesEvalues = Evaluation::where('statut', 'terminée')->distinct('user_id')->count();
        $totalUsers = User::count();

        $tauxParticipation = $totalUsers > 0
            ? round(($employesEvalues / $totalUsers) * 100, 2)
            : 0;

        // Moyenne d'évaluations par employé
        $moyenneEvaluations = $totalUsers > 0
            ? round($totalEvaluations / $totalUsers, 2)
            : 0;

        // ================================
        // 2. Données mensuelles (6 derniers mois)
        // ================================
        $moisLabels = [];
        $dataTerminees = [];
        $dataEnCours = [];
        $dataAnnulees = [];
        $dataEnAttente = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $moisLabels[] = ucfirst($date->locale('fr')->isoFormat('MMM YYYY'));

            $start = $date->copy()->startOfMonth();
            $end = $date->copy()->endOfMonth();

            $dataTerminees[] = Evaluation::whereBetween('created_at', [$start, $end])
                ->where('statut', 'terminée')->count();

            $dataEnCours[] = Evaluation::whereBetween('created_at', [$start, $end])
                ->where('statut', 'en cours')->count();

            $dataAnnulees[] = Evaluation::whereBetween('created_at', [$start, $end])
                ->where('statut', 'annulée')->count();

            $dataEnAttente[] = Evaluation::whereBetween('created_at', [$start, $end])
                ->where('statut', 'en attente')->count();
        }

        // ================================
        // 3. Répartition par statut
        // ================================
        $statuts = [
            'terminée'   => $evaluationsTermines,
            'en cours'   => $evaluationsEnCours,
            'annulée'    => $evaluationsAnnules,
            'en attente' => $evaluationsEnAttente,
        ];

        // ================================
        // 4. Passage à la vue
        // ================================
        return view('welcome', [
            'totalEvaluations'     => $totalEvaluations,
            'evaluationsTermines'  => $evaluationsTermines,
            'evaluationsEnCours'   => $evaluationsEnCours,
            'evaluationsAnnules'   => $evaluationsAnnules,
            'evaluationsEnAttente' => $evaluationsEnAttente,

            'employesEvalues'      => $employesEvalues,
            'totalUsers'           => $totalUsers,
            'tauxParticipation'    => $tauxParticipation,
            'moyenneEvaluations'   => $moyenneEvaluations,

            'moisLabels'           => $moisLabels,
            'dataTerminees'        => $dataTerminees,
            'dataEnCours'          => $dataEnCours,
            'dataAnnulees'         => $dataAnnulees,
            'dataEnAttente'        => $dataEnAttente,
            'statuts'              => $statuts,
        ]);
    }
}
