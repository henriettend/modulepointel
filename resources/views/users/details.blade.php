<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'utilisateur</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Détails de l'utilisateur</h4>
            </div>
            <div class="card-body">
                <p><strong>Nom :</strong> {{ $user->nom }}</p>
                <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
                <p><strong>Email :</strong> {{ $user->email }}</p>
                <p><strong>Téléphone :</strong> {{ $user->telephone ?? 'Non renseigné' }}</p>
                <p><strong>Rôle :</strong> {{ $user->role->libelle ?? 'Aucun rôle' }}</p>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">← Retour à la liste</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
