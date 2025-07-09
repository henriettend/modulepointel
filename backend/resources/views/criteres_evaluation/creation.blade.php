@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h3>Ajouter un critère d’évaluation</h3>

    <form action="{{ route('criteres_evaluation.store') }}" method="POST">
        @csrf

        <!-- On garde la compétence liée en champ caché -->
        <input type="hidden" name="competence_id" value="{{ $competenceId }}">

        <div class="mb-3">
            <label for="titre" class="form-label">Titre du critère</label>
            <input type="text" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" value="{{ old('titre') }}" required>
            @error('titre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (optionnelle)</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Ajouter le critère</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary ms-2">Retour</a>
    </form>
</div>
@endsection
