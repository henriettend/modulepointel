<!-- resources/views/objectifs/liste.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Liste des Objectifs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body {
      background-color: #e9ecef;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card-style {
      background-color: #fff;
      padding: 35px 40px;
      border-radius: 14px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
      max-width: 1000px;
      margin: auto;
    }
    h1 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 30px;
      color: #0d6efd;
      text-align: center;
      letter-spacing: 1px;
    }
    table {
      border-collapse: separate;
      border-spacing: 0 10px;
      width: 100%;
    }
    thead th {
      background-color: #f1f3f5;
      color: #495057;
      font-weight: 600;
      padding: 15px 20px;
      border-radius: 8px;
    }
    tbody tr {
      background-color: #ffffff;
      box-shadow: 0 3px 6px rgb(0 0 0 / 0.05);
      transition: box-shadow 0.3s ease;
    }
    tbody tr:hover {
      box-shadow: 0 6px 15px rgb(0 0 0 / 0.12);
    }
    td {
      padding: 16px 20px;
      vertical-align: middle;
      color: #343a40;
    }
    .btn {
      border-radius: 8px;
      font-weight: 600;
      transition: 0.3s;
    }
    .btn-sm {
      padding: 6px 14px;
      font-size: 0.9rem;
    }
    .btn-warning:hover,
    .btn-danger:hover,
    .btn-success:hover {
      box-shadow: 0 0 8px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>
<body>
  <div class="py-5">
    <div class="card-style">
      <h1>Liste des Objectifs</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Intitulé</th>
            <th>Description</th>
            <th>Pondération</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($objectifs as $objectif)
            <tr>
              <td>{{ $objectif->intitule }}</td>
              <td>{{ $objectif->description }}</td>
              <td>{{ $objectif->ponderation }}</td>
              <td>
                <a href="{{ route('objectifs.details', $objectif->id) }}" class="btn btn-success btn-sm">Voir</a>
<a href="{{ route('objectifs.modification', $objectif->id) }}" class="btn btn-primary">
    Modifier
</a>
                <form action="{{ route('objectifs.destroy', $objectif->id) }}" method="POST" style="display:inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet objectif ?')">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('objectifs.creation') }}" class="btn btn-primary mt-4">Ajouter un Objectif</a>
    </div>
  </div>
</body>
</html>
