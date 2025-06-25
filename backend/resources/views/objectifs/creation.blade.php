<!-- resources/views/objectifs/creation.blade.php -->
@extends('layouts.master')

@section('content')
  <div class="container mt-5">
    <div class="card p-4">
      <h3 class="mb-4">Créer un objectif</h3>
      <form action="{{ route('objectifs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="intitule" class="form-label">Intitulé</label>
          <input type="text" class="form-control" id="intitule" name="intitule" required>
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="ponderation" class="form-label">Pondération</label>
          <input type="number" step="0.01" class="form-control" id="ponderation" name="ponderation" required>
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
