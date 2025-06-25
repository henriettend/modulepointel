@extends('layouts.master')
@section('content')
  <div class="container mt-5">
    <div class="card shadow rounded">
      <div class="card-header bg-info text-white">
        <h3 class="mb-0">Détails de la compétence</h3>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <strong>Intitulé :</strong>
          <p>{{ $competence->intitule }}</p>
        </div>

        <div class="mb-3">
          <strong>Type :</strong>
          <p>{{ ucfirst($competence->type) }}</p>
        </div>

        <div class="mb-3">
          <strong>Créée le :</strong>
          <p>{{ $competence->created_at->format('d/m/Y à H:i') }}</p>
        </div>

        <div class="mb-3">
          <strong>Dernière mise à jour :</strong>
          <p>{{ $competence->updated_at->format('d/m/Y à H:i') }}</p>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <a href="{{ route('competences.index') }}" class="btn btn-secondary">← Retour à la liste</a>

        <div>
          <a href="{{ route('competences.modification', $competence->id) }}" class="btn btn-warning me-2">Modifier</a>

          <form action="{{ route('competences.destroy', $competence->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection