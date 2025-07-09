@extends('layouts.master')

@section('content')
  <div class="container mt-5">
    <div class="form-card">
      <h3 class="mb-4">Modifier l'évaluation</h3>

      <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" 
                   value="{{ old('titre', $evaluation->titre) }}" required />
            @error('titre')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $evaluation->description) }}</textarea>
          @error('description')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="dateDebut" class="form-label">Date de début</label>
            <input type="date" class="form-control" id="dateDebut" name="dateDebut" 
                   value="{{ old('dateDebut', $evaluation->dateDebut) }}" required />
            @error('dateDebut')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="dateFin" class="form-label">Date de fin</label>
            <input type="date" class="form-control" id="dateFin" name="dateFin" 
                   value="{{ old('dateFin', $evaluation->dateFin) }}" required />
            @error('dateFin')
              <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-3">
          <label for="statut" class="form-label">Statut</label>
          <select class="form-select" id="statut" name="statut" required>
            <option value="en attente" {{ old('statut', $evaluation->statut) == 'en attente' ? 'selected' : '' }}>En attente</option>
            <option value="en cours" {{ old('statut', $evaluation->statut) == 'en cours' ? 'selected' : '' }}>En cours</option>
            <option value="terminée" {{ old('statut', $evaluation->statut) == 'terminée' ? 'selected' : '' }}>Terminée</option>
            <option value="annulée" {{ old('statut', $evaluation->statut) == 'annulée' ? 'selected' : '' }}>Annulée</option>
          </select>
          @error('statut')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="user_id" class="form-label">Employé évalué</label>
          <select class="form-select" id="user_id" name="user_id" required>
            <option value="">-- Sélectionnez un employé --</option>
            @foreach($users as $user)
              <option value="{{ $user->id }}" {{ old('user_id', $evaluation->user_id) == $user->id ? 'selected' : '' }}>
                {{ $user->prenom }} {{ $user->nom }}
              </option>
            @endforeach
          </select>
          @error('user_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="manager_id" class="form-label">Manager</label>
          <select class="form-select" id="manager_id" name="manager_id" required>
            <option value="">-- Sélectionnez un manager --</option>
            @foreach($managers as $manager)
              <option value="{{ $manager->id }}" {{ old('manager_id', $evaluation->manager_id) == $manager->id ? 'selected' : '' }}>
                {{ $manager->prenom }} {{ $manager->nom }}
              </option>
            @endforeach
          </select>
          @error('manager_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="campagne_evaluations_id" class="form-label">Campagne d'évaluation</label>
          <select class="form-select" id="campagne_evaluations_id" name="campagne_evaluations_id">
            <option value="">-- Sélectionnez une campagne --</option>
            @foreach($campagnes as $campagne)
              <option value="{{ $campagne->id }}" {{ old('campagne_evaluations_id', $evaluation->campagne_evaluations_id) == $campagne->id ? 'selected' : '' }}>
                {{ $campagne->titre }}
              </option>
            @endforeach
          </select>
          @error('campagne_evaluations_id')
            <div class="text-danger">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary me-2">Mettre à jour</button>
          <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection