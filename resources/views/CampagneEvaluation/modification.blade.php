<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Campagne</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 w-100" style="max-width: 650px;">
        <h3 class="text-center mb-4">Modifier la Campagne</h3>

        <form action="{{ route('campagne.mise_a_jour', ['id' => $campagne->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre"
                       value="{{ old('titre', $campagne->titre) }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type de campagne</label>
                <select class="form-select" id="type" name="type" required>
                    <option disabled>Choisissez un type</option>
                    <option value="auto" {{ old('type', $campagne->type) == 'auto' ? 'selected' : '' }}>Auto-évaluation</option>
                    <option value="360" {{ old('type', $campagne->type) == '360' ? 'selected' : '' }}>Évaluation objective</option>
                    <option value="peer" {{ old('type', $campagne->type) == 'peer' ? 'selected' : '' }}>Évaluation de compétences</option>
                    <option value="manager" {{ old('type', $campagne->type) == 'manager' ? 'selected' : '' }}>Évaluation du manager</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="form-control">{{ old('description', $campagne->description) }}</textarea>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="dateDebut" class="form-label">Date de début</label>
                    <input type="date" class="form-control" id="dateDebut" name="dateDebut"
                           value="{{ old('dateDebut', $campagne->dateDebut) }}" required>
                </div>
                <div class="col">
                    <label for="dateFin" class="form-label">Date de fin</label>
                    <input type="date" class="form-control" id="dateFin" name="dateFin"
                           value="{{ old('dateFin', $campagne->dateFin) }}" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="statut" class="form-label">Statut</label>
                <select class="form-select" id="statut" name="statut" required>
                    <option value="en attente" {{ old('statut', $campagne->statut) == 'en attente' ? 'selected' : '' }}>En attente</option>
                    <option value="en cours" {{ old('statut', $campagne->statut) == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="terminée" {{ old('statut', $campagne->statut) == 'terminée' ? 'selected' : '' }}>Terminée</option>
                    <option value="annulée" {{ old('statut', $campagne->statut) == 'annulée' ? 'selected' : '' }}>Annulée</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Mettre à jour</button>
        </form>
    </div>
</div>

</body>
</html>
