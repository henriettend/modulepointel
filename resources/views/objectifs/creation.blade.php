<!-- resources/views/objectifs/creation.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Créer un objectif</title>
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
      <h3 class="mb-4">Créer un objectif</h3>
      <form action="{{ route('objectifs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="intitule" class="form-label">Intitulé</label>
          <input type="text" class="form-control" id="intitule" name="intitule" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="ponderation" class="form-label">Pondération</label>
          <input type="number" step="0.01" class="form-control" id="ponderation" name="ponderation" required>
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
