<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Détails de la Campagne</title>
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
            max-width: 600px;
            margin: 40px auto;
        }
        h1 {
            font-weight: 600;
            margin-bottom: 25px;
        }
        .label {
            font-weight: 600;
            color: #555;
        }
        .value {
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-style">
            <h1>Détails de la Campagne</h1>

            <div>
                <div class="label">Titre :</div>
                <div class="value">{{ $campagne->titre }}</div>
            </div>

            <div>
                <div class="label">Type :</div>
                <div class="value">{{ $campagne->type }}</div>
            </div>

            <div>
                <div class="label">Description :</div>
                <div class="value">{{ $campagne->description }}</div>
            </div>

            <div>
                <div class="label">Date de début :</div>
                <div class="value">{{ $campagne->dateDebut }}</div>
            </div>

            <div>
                <div class="label">Date de fin :</div>
                <div class="value">{{ $campagne->dateFin }}</div>
            </div>

            <div>
                <div class="label">Statut :</div>
                <div class="value">{{ $campagne->statut }}</div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('campagneEvaluation.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour à la liste
                </a>
            </div>
        </div>
    </div>
</body>
</html>
