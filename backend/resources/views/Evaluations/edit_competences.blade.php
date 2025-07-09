@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="mb-0">   Choisir les compétences a évaluer : <strong>{{ $evaluation->titre }}</strong></h3>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('evaluations.competences.update', $evaluation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-4">
            @foreach ($competences as $competence)
                <div class="col-12">
                    <div class="border rounded p-4 shadow-sm">
                        <div class="form-check">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="competences[]"
                                   value="{{ $competence->id }}"
                                   id="competence_{{ $competence->id }}"
                                   {{ in_array($competence->id, $competenceIds) ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold fs-5" for="competence_{{ $competence->id }}">
                                {{ $competence->intitule }}
                            </label>
                        </div>

                        @if ($competence->criteres->count())
                            <div class="mt-3 ps-4">
                                <p class="fw-semibold text-muted mb-1">Critères associés :</p>
                                <ul class="mb-0">
                                    @foreach ($competence->criteres as $critere)
                                        <li class="text-dark">{{ $critere->titre }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p class="mt-2 ps-4 text-muted fst-italic">Aucun critère défini pour cette compétence.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-end mt-5">
            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
            <a href="{{ route('evaluations.index') }}" class="btn btn-secondary ms-3 px-4">Annuler</a>
        </div>
    </form>
</div>
@endsection
