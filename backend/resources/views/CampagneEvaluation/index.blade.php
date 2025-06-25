@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card-style">
            <h1 class="mb-4">Liste des Campagnes d'Évaluation</h1>

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campagnes as $campagne)
                            <tr>
                                <td>{{ $campagne->titre }}</td>
                                <td>{{ $campagne->type }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($campagne->description, 35) }}</td>
                                <td>{{ $campagne->dateDebut }}</td>
                                <td>{{ $campagne->dateFin }}</td>
                                <td>{{ $campagne->statut }}</td>
                                <td class="d-flex gap-2">
    <a href="{{ route('campagneEvaluation.details', $campagne->id) }}" 
       class="btn btn-sm d-inline-flex align-items-center" 
       style="background-color: #0dcaf0; color: white;" 
       title="Détails">
        <i class="bi bi-info-circle me-1"></i> Détails
    </a>

    <a href="{{ route('campagneEvaluation.modification', $campagne->id) }}" 
       class="btn btn-sm d-inline-flex align-items-center" 
       style="background-color: #ffc107; color: black;" 
       title="Modifier">
        <i class="bi bi-pencil-square me-1"></i> Modifier
    </a>

    <form action="{{ route('campagneEvaluation.suppression', $campagne->id) }}" 
          method="POST" 
          onsubmit="return confirm('Confirmer la suppression ?')">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="btn btn-sm d-inline-flex align-items-center" 
                style="background-color: #dc3545; color: white;" 
                title="Supprimer">
            <i class="bi bi-trash me-1"></i> Supprimer
        </button>
    </form>
</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('campagneEvaluation.creation') }}" 
                   class="btn btn-lg" 
                   style="background-color: #ff9911; color: white; border: none;">
                    + Créer une campagne
                </a>
            </div>
        </div>
    </div>
@endsection
