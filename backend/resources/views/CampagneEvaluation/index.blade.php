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
                                       class="btn btn-sm btn-info d-inline-flex align-items-center justify-content-center"
                                       style="width: 38px; height: 38px; padding: 0;"
                                       title="Détails">
                                        <i class="bi bi-info-circle" style="font-size: 1.2rem; color: white;"></i>
                                    </a>

                                    <a href="{{ route('campagneEvaluation.modification', $campagne->id) }}" 
                                       class="btn btn-sm btn-warning d-inline-flex align-items-center justify-content-center"
                                       style="width: 38px; height: 38px; padding: 0;"
                                       title="Modifier">
                                        <i class="bi bi-pencil-square" style="font-size: 1.2rem; color: black;"></i>
                                    </a>

                                    <form action="{{ route('campagneEvaluation.suppression', $campagne->id) }}" 
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
