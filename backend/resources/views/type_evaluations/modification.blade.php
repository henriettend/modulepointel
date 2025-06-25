@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1>Modifier le type d'évaluation</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('type_evaluations.update', $typeEvaluation->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="intitule" class="form-label">Intitulé</label>
                <input type="text" class="form-control" id="intitule" name="intitule" value="{{ old('intitule', $typeEvaluation->intitule) }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $typeEvaluation->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('type_evaluations.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    @endsection
