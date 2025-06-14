<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modifier une compétence</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h2>Modifier la compétence</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('competences.update', $competence->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="intitule" class="form-label">Intitulé</label>
        <input type="text" name="intitule" id="intitule" class="form-control" value="{{ old('intitule', $competence->intitule) }}" required>
      </div>

      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-select" required>
          <option value="">-- Sélectionner --</option>
          <option value="technique" {{ old('type', $competence->type) == 'technique' ? 'selected' : '' }}>Technique</option>
          <option value="comportementale" {{ old('type', $competence->type) == 'comportementale' ? 'selected' : '' }}>Comportementale</option>
        </select>
      </div>

      <button type="submit" class="btn btn-success">Enregistrer les modifications</button>
      <a href="{{ route('competences.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
  </div>
</body>
</html>
