@extends('layouts.master')

@section('content')
  <div class="form-card">
    <h3 class="mb-4">Créer un nouveau rôle</h3>

    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('roles.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="libelle" class="form-label">Libellé du rôle</label>
        <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" value="{{ old('libelle') }}" required>
        @error('libelle')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-2">Créer</button>
        <button type="reset" class="btn btn-secondary">Annuler</button>
      </div>
    </form>
  </div>

  @endsection
