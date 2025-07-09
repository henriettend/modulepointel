@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Modifier la Grille d'Évaluation</h1>

        {{-- Affichage des erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire de modification --}}
        <form method="POST" action="{{ route('grilleEvaluation.update', $grille->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control"
                       value="{{ old('titre', $grille->titre) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $grille->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="campagne_evaluations_id" class="form-label">Campagne Évaluation</label>
                <select name="campagne_evaluations_id" id="campagne_evaluations_id" class="form-select" required>
                    <option value="">-- Sélectionner une campagne --</option>
                    @foreach ($campagnes as $campagne)
                        <option value="{{ $campagne->id }}"
                            {{ old('campagne_evaluations_id', $grille->campagne_evaluations_id) == $campagne->id ? 'selected' : '' }}>
                            {{ $campagne->titre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-warning">Mettre à jour</button>
            <a href="{{ route('grilleEvaluation.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
