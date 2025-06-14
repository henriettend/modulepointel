<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Liste des utilisateurs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Liste des utilisateurs</h2>
    </div>

    @if ($users->isEmpty())
      <div class="alert alert-info">Aucun utilisateur trouvé.</div>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-dark text-center">
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Téléphone</th>
              <th>Rôle</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->prenom }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->telephone ?? 'N/A' }}</td>
                <td>{{ $user->role->libelle ?? 'Non défini' }}</td>
                <td>
                  <a href="{{ route('user.details', $user->id) }}" class="btn btn-info btn-sm mb-1">Détails</a>
                  <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm mb-1">Modifier</a>
                  <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mb-1">Supprimer</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif

    <div class="text-center mt-4">
      <a href="{{ route('user.creation') }}" class="btn btn-primary btn-lg">
        + Créer un nouvel utilisateur
      </a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
