@extends('layouts.master')

@section('content')
  <div class="container mt-5">
    <div class="card p-4">
      <h2 class="mb-4">Modifier l'utilisateur</h2>

      <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
          <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $user->nom) }}" required>
          </div>
          <div class="col-md-6">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
          <label for="telephone" class="form-label">Téléphone</label>
          <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}">
        </div>

        <div class="mb-3">
          <label for="role" class="form-label">Rôle</label>
          <select name="role_id" id="role" class="form-select" required>
            <option value="">-- Sélectionnez un rôle --</option>
            @foreach ($roles as $role)
              <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                {{ $role->libelle }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="d-flex justify-content-end">
<button type="submit" class="btn me-2" style="background-color: #ff9911; color: #fff; border: none;">
  Mettre à jour
</button>          <a href="{{ route('user.index') }}" class="btn btn-secondary">Annuler</a>
        </div>
      </form>
    </div>
  </div>
@endsection
