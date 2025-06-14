<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Grille d'Évaluation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Créer une Grille d'Évaluation</h1>

        {{-- Affichage des erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulaire de création --}}
        <form method="POST" action="{{ route('grilleEvaluation.store') }}">
            @csrf

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="campagne_evaluations_id" class="form-label">Campagne Évaluation</label>
                <select name="campagne_evaluations_id" id="campagne_evaluations_id" class="form-select" required>
                    <option value="">-- Sélectionner une campagne --</option>
                    @foreach ($campagnes as $campagne)
                        <option value="{{ $campagne->id }}" {{ old('campagne_evaluations_id') == $campagne->id ? 'selected' : '' }}>
                            {{ $campagne->titre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Créer</button>
            <a href="{{ route('grilleEvaluation.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>

    {{-- Optionnel : Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
