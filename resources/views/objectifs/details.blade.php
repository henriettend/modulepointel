<!-- resources/views/objectifs/details.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Détail de l'Objectif</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border-radius: 12px;
      padding: 30px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .card-title {
      font-size: 26px;
      font-weight: bold;
      color: #0d6efd;
      margin-bottom: 25px;
    }
    .list-group-item strong {
      width: 150px;
      display: inline-block;
    }
    .btn-back {
      margin-top: 30px;
      border-radius: 10px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-back i {
      font-size: 1.1rem;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-white">
          <h1 class="card-title">Détail de l'Objectif</h1>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>ID :</strong> {{ $objectif->id }}</li>
            <li class="list-group-item"><strong>Intitulé :</strong> {{ $objectif->intitule }}</li>
            <li class="list-group-item"><strong>Description :</strong> {{ $objectif->description }}</li>
            <li class="list-group-item"><strong>Pondération :</strong> {{ $objectif->ponderation }}</li>
          </ul>
          <a href="{{ route('objectifs.index') }}" class="btn btn-secondary btn-back">
            <i class="bi bi-arrow-left"></i> Retour à la liste
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
