@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Créer un utilisateur</h2>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">← Retour à la liste</a>
    </div>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Adresse e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-6">
                    <label for="telephone" class="form-label">Téléphone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" value="{{ old('telephone') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="role" class="form-label">Rôle</label>
                <select class="form-select" id="role" name="role" required>
                    <option selected disabled>Choisissez un rôle</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('role') == $role->id ? 'selected' : '' }}>
                            {{ $role->libelle }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2">Créer</button>
                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
            </div>
        </form>
    </div>
</div>
@endsection
