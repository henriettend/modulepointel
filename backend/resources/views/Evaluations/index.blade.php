@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card-style">
            <h1 class="mb-4">Liste des Évaluations</h1>

            <div class="text-center mb-4">
                <a href="{{ route('evaluations.creation') }}" 
                   class="btn btn-lg" 
                   style="background-color: 
#ff9911; color: white; border: none;">
                    + Créer une évaluation
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date Début</th>
                            <th>Date Fin</th>
                            <th>Statut</th>
                            <th>Manager</th>
                            <th>Campagne</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($evaluations as $evaluation)
                            <tr>
                                <td>{{ $evaluation->titre }}</td>
                                <td>{{ Str::limit($evaluation->description, 35) }}</td>
                                <td>{{ $evaluation->dateDebut }}</td>
                                <td>{{ $evaluation->dateFin }}</td>
                                <td>
                                    <span class="badge bg-{{ 
                                        $evaluation->statut === 'en cours' ? 'warning' : (
                                        $evaluation->statut === 'terminée' ? 'success' : (
                                        $evaluation->statut === 'annulée' ? 'danger' : 'secondary')) }}">
                                        {{ ucfirst($evaluation->statut) }}
                                    </span>
                                </td>
                                <td>{{ $evaluation->manager->prenom ?? '' }} {{ $evaluation->manager->nom ?? '' }}</td>
                                <td>{{ $evaluation->campagne->titre ?? 'Non défini' }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('evaluations.details', $evaluation->id) }}" 
                                       class="btn btn-sm btn-info d-inline-flex align-items-center justify-content-center"
                                       style="width: 38px; height: 38px; padding: 0;"
                                       title="Voir">
                                        <i class="bi bi-info-circle" style="font-size: 1.2rem; color: white;"></i>
                                    </a>

                                    <a href="{{ route('evaluations.modification', $evaluation->id) }}" 
                                       class="btn btn-sm btn-warning d-inline-flex align-items-center justify-content-center"
                                       style="width: 38px; height: 38px; padding: 0;"
                                       title="Modifier">
                                        <i class="bi bi-pencil-square" style="font-size: 1.2rem; color: black;"></i>
                                    </a>

                                    <form action="{{ route('evaluations.suppression', $evaluation->id) }}" 
                                          method="POST" 
                                          onsubmit="return confirm('Confirmer la suppression ?')"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-danger d-inline-flex align-items-center justify-content-center"
                                                style="width: 38px; height: 38px; padding: 0;"
                                                title="Supprimer">
                                            <i class="bi bi-trash" style="font-size: 1.2rem; color: white;"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Aucune évaluation trouvée.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
@endsection
