<!-- resources/views/objectifs/modification.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Modifier un objectif</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
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
    <div class="card p-4">
      <h3 class="mb-4">Modifier l’objectif</h3>

      <form action="{{ route('objectifs.update', $objectif->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="intitule" class="form-label">Intitulé</label>
          <input type="text" class="form-control" id="intitule" name="intitule" value="{{ old('intitule', $objectif->intitule) }}" required>
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $objectif->description) }}</textarea>
        </div>

        <div class="mb-3">
          <label for="ponderation" class="form-label">Pondération</label>
          <input type="number" step="0.01" class="form-control" id="ponderation" name="ponderation" value="{{ old('ponderation', $objectif->ponderation) }}" required>
        </div>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary me-2">Mettre à jour</button>
          <a href="{{ route('objectifs.liste') }}" class="btn btn-secondary">Annuler</a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
