<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Modifier un Objectif</title>
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
            max-width: 650px;
            margin: auto;
        }
        h1 {
            font-size: 28px;
            font-weight: 700;
            color: #0d6efd;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-label {
            font-weight: 600;
        }
        .btn-success {
            background-color: #198754;
            border-color: #198754;
            font-weight: 700;
            padding: 10px 24px;
            border-radius: 10px;
        }
        .btn-success:hover {
            background-color: #146c43;
            border-color: #146c43;
            box-shadow: 0 0 12px #146c4388;
        }
        .btn-secondary {
            border-radius: 10px;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card-style">
            <h1>Modifier un Objectif</h1>

            <form action="{{ route('objectifs.update', $objectif->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre', $objectif->titre) }}" required>
                    @error('titre')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" rows="4" class="form-control" required>{{ old('description', $objectif->description) }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('objectifs.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-lg"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
