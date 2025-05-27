<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Créer un role</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body { background-color: #f8f9fa; }
    .form-card {
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }
    .form-label { font-weight: 500; }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="form-card">
      <h3 class="mb-4">Créer un role</h3>
      <form action="{{ route('roles.store') }}" method="POST">
        @csrf

       

        <div class="mb-3">
          <label for="description" class="form-label">libelle</label>
          <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
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
