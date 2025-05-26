<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Créer une campagne d'évaluation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-card {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }
    .form-label {
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="form-card">
      <h3 class="mb-4">Créer une campagne d'évaluation</h3>
      <form action="{{ route('campagneEvaluation.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" required>
          </div>
          <div class="col-md-6">
            <label for="type" class="form-label">Type de campagne</label>
            <select class="form-select" id="type" name="type" required>
              <option selected disabled>Choisissez un type</option>
              <option value="auto">Auto-évaluation</option>
              <option value="360">Évaluation objective</option>
              <option value="peer">Évaluation de competences</option>
              <option value="manager">Évaluation du manager</option>
            </select>
          </div>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="dateDebut" class="form-label">Date de début</label>
            <input type="date" class="form-control" id="dateDebut" name="dateDebut" required>
          </div>
          <div class="col-md-6">
            <label for="dateFin" class="form-label">Date de fin</label>
            <input type="date" class="form-control" id="dateFin" name="dateFin" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="statut" class="form-label">Statut</label>
          <select class="form-select" id="statut" name="statut" required>
            <option value="en attente" selected>En attente</option>
            <option value="en cours">En cours</option>
            <option value="terminée">Terminée</option>
            <option value="annulée">Annulée</option>
          </select>
        </div>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary me-2">Créer</button>
          <button type="reset" class="btn btn-secondary">Annuler</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
