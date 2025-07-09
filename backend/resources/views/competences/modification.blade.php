@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Modifier la compétence</h2>

    <form action="{{ route('competences.update', $competence->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="intitule" class="form-label">Intitulé</label>
            <input type="text" class="form-control" id="intitule" name="intitule" value="{{ old('intitule', $competence->intitule) }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" id="type" name="type" required>
                <option value="technique" {{ $competence->type == 'technique' ? 'selected' : '' }}>Technique</option>
                <option value="comportementale" {{ $competence->type == 'comportementale' ? 'selected' : '' }}>Comportementale</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('competences.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
