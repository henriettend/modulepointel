@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Détail du type d'évaluation</h1>

        <div class="card">
            <div class="card-header">
                <h3>{{ $typeEvaluation->intitule }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Description :</strong></p>
                <p>{{ $typeEvaluation->description ?? 'Aucune description fournie.' }}</p>
                <p><small>Créé le : {{ $typeEvaluation->created_at->format('d/m/Y H:i') }}</small></p>
                <p><small>Mis à jour le : {{ $typeEvaluation->updated_at->format('d/m/Y H:i') }}</small></p>
            </div>
        </div>

        <a href="{{ route('type_evaluations.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
        <a href="{{ route('type_evaluations.modification', $typeEvaluation->id) }}" class="btn btn-primary mt-3">Modifier</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
