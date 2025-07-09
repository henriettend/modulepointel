@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h3>Détail du critère d’évaluation</h3>

    <div class="card p-3">
        <p><strong>ID :</strong> {{ $critere_evaluation->id }}</p>
        <p><strong>Titre :</strong> {{ $critere_evaluation->titre }}</p>
        <p><strong>Description :</strong> {{ $critere_evaluation->description ?? 'Aucune description' }}</p>
        <p><strong>Compétence liée :</strong> {{ $critere_evaluation->competence->nom ?? 'Non définie' }}</p>
    </div>

    <a href="{{ route('criteres_evaluation.edit', $critere_evaluation->id) }}" class="btn btn-warning mt-3">Modifier</a>
    <a href="{{ route('criteres_evaluation.index') }}" class="btn btn-secondary mt-3 ms-2">Retour à la liste</a>
</div>
@endsection
