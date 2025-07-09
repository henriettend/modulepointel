@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card p-4 shadow-sm">
            <h2 class="mb-4 text-primary">Détail de l'évaluation : {{ $evaluation->titre }}</h2>

            <p><strong>Description :</strong> {{ $evaluation->description }}</p>
            <p><strong>Date début :</strong> {{ $evaluation->dateDebut }}</p>
            <p><strong>Date fin :</strong> {{ $evaluation->dateFin }}</p>
            <p><strong>Statut :</strong> {{ $evaluation->statut }}</p>
            <p><strong>Employé évalué :</strong> {{ $evaluation->user->prenom }} {{ $evaluation->user->nom }}</p>
            <p><strong>Manager :</strong> {{ $evaluation->manager->prenom }} {{ $evaluation->manager->nom }}</p>
            <p><strong>Campagne :</strong> {{ $evaluation->campagne->titre ?? 'Non spécifiée' }}</p>
            <p><strong>Type :</strong> {{ $evaluation->typeEvaluation->intitule }}</p>

            <hr>

            <h4 class="mt-4 fw-bold text-primary">Compétences associées</h4>

            @forelse($evaluation->competences as $competence)
                <div class="mb-4 ps-3 border-start border-4 border-primary">
                    <h5 class="fw-semibold text-dark">{{ $competence->intitule }}</h5>

                    @if ($competence->criteres->isNotEmpty())
                        <ul class="ms-3">
                            @foreach ($competence->criteres as $critere)
                                <li>
                                    <strong>{{ $critere->titre }}</strong>
                                    @if($critere->description)
                                        — <em>{{ $critere->description }}</em>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted ms-3">Aucun critère défini pour cette compétence.</p>
                    @endif
                </div>
            @empty
                <p class="text-muted">Aucune compétence associée à cette évaluation.</p>
            @endforelse

            <div class="mt-4">
                <a href="{{ route('evaluations.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>
@endsection
