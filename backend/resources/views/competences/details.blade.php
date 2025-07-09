@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Détail de la compétence : {{ $competence->intitule }}</h3>
            <a href="{{ route('competences.index') }}" class="btn btn-secondary">← Retour à la liste</a>
        </div>

        <p><strong>Type :</strong> {{ $competence->type }}</p>

        <!-- Bouton vers la page de création d'un critère lié -->
        <a href="{{ route('criteres_evaluation.creation', ['competence_id' => $competence->id]) }}" class="btn btn-primary mt-3">
            Ajouter un critère d’évaluation
        </a>
    </div>
</div>
@endsection
