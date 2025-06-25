@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card-style">
            <h1>Modifier un Objectif</h1>

            <form action="{{ route('objectifs.update', $objectif->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre', $objectif->titre) }}" required>
                    @error('titre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" rows="4" class="form-control" required>{{ old('description', $objectif->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('objectifs.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-lg"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
