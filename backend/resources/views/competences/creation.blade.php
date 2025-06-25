@extends('layouts.master') 
@section('content')
  <div class="container mt-5">
    <div class="card p-4">
      <h3 class="mb-4">Créer une compétence</h3>
      <form action="{{ route('competences.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="intitule" class="form-label">Intitulé <span class="text-danger">*</span></label>
          <input type="text" class="form-control" id="intitule" name="intitule" required>
        </div>

        <div class="mb-3">
  <label class="form-label d-block">Type de compétence <span class="text-danger">*</span></label>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="type" id="technique" value="technique" required>
    <label class="form-check-label" for="technique">Technique</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="type" id="organisationnelle" value="organisationnelle">
    <label class="form-check-label" for="organisationnelle">Organisationnelle</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name="type" id="comportementale" value="comportementale">
    <label class="form-check-label" for="comportementale">Comportementale</label>
  </div>
</div>


      

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-primary me-2">Créer</button>
          <button type="reset" class="btn btn-secondary">Annuler</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection