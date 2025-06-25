@extends('layouts.master')

@section('content')
  <div class="container mt-5">
    <div class="table-card">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Liste des évaluations</h3>
        <a href="{{ route('evaluations.creation') }}" class="btn btn-primary">Créer une nouvelle évaluation</a>
      </div>

      <table class="table table-hover">
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
              <td>{{ Str::limit($evaluation->description,10) }}</td>
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
              <td>
                <a href="{{ route('evaluations.details', $evaluation->id) }}" class="btn btn-sm btn-info text-white">Voir</a>
                <a href="{{ route('evaluations.modification', $evaluation->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                <form action="{{ route('evaluations.suppression', $evaluation->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">Supprimer</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="9" class="text-center">Aucune évaluation trouvée.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection