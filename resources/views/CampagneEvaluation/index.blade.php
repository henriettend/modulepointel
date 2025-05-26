<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Liste des Campagnes d'Évaluation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-style {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }
        h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 25px;
        }
        table th, table td {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card-style">
            <h1 class="mb-4">Liste des Campagnes d'Évaluation</h1>

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($campagnes as $campagne)
                            <tr>
                                <td>{{ $campagne->titre }}</td>
                                <td>{{ $campagne->type }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($campagne->description, 35) }}</td>
                                <td>{{ $campagne->dateDebut }}</td>
                                <td>{{ $campagne->dateFin }}</td>
                                <td>{{ $campagne->statut }}</td>
                                <td>
                                    <a href="{{ route('campagneEvaluation.details', $campagne->id) }}" class="btn btn-sm btn-info me-1" title="Détails">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                            
                                    <a href="{{ route('campagneEvaluation.modification', $campagne->id) }}" class="btn btn-sm btn-warning me-1" title="Modifier">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('campagneEvaluation.suppression', $campagne->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('campagneEvaluation.creation') }}" class="btn btn-success">Créer une campagne</a>
            </div>
        </div>
    </div>
</body>
</html>
