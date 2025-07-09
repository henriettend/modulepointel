@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Liste des Grilles d'Évaluation</h1>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Lien vers la création --}}
    <div class="mb-3">
<a href="{{ route('grilleEvaluation.creation') }}"
   class="btn"
   style="background-color: #ff9911; color: white; border: none;">
   Créer une nouvelle Grille
</a>
    </div>

    {{-- Tableau des grilles --}}
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
        <tr>
            <th>Titre</th>
            <th>Description</th>
            <th>Campagne</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($grilles as $grille)
            <tr>
                <td>{{ $grille->titre }}</td>
                <td>{{ $grille->description }}</td>
                <td>{{ $grille->campagne->titre ?? 'Non défini' }}</td>
                <td>
                    <a href="{{ route('grilles.edit', $grille->id) }}" class="btn btn-sm btn-warning">Modifier</a>

                    <form action="{{ route('grilles.destroy', $grille->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">Aucune grille d'évaluation trouvée.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
