@extends('layouts.master')

@section('content')
  <div class="row">
    <!-- Total utilisateurs -->
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="fw-bolder mb-75">{{ $totalUsers }}</h3>
                    <span>Total utilisateurs</span>
                </div>
                <div class="avatar bg-light-primary p-50">
                    <span class="avatar-content">
                        <i data-feather="user" class="font-medium-4"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Total managers -->
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="fw-bolder mb-75">{{ $totalManagers }}</h3>
                    <span>Total managers</span>
                </div>
                <div class="avatar bg-light-danger p-50">
                    <span class="avatar-content">
                        <i data-feather="user-plus" class="font-medium-4"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Total employés -->
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="fw-bolder mb-75">{{ $totalEmployes }}</h3>
                    <span>Total employés</span>
                </div>
                <div class="avatar bg-light-success p-50">
                    <span class="avatar-content">
                        <i data-feather="users" class="font-medium-4"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
<!-- Total employés -->
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="fw-bolder mb-75">{{ $totalRh}}</h3>
                    <span>Total Rh</span>
                </div>
                <div class="avatar bg-light-success p-50">
                    <span class="avatar-content">
                        <i data-feather="users" class="font-medium-4"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending users -->
    

   <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Liste des utilisateurs</h2>
    </div>

    @if ($users->isEmpty())
      <div class="alert alert-info">Aucun utilisateur trouvé.</div>
    @else
      <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
          <thead class="table-dark text-center">
            <tr>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Téléphone</th>
              <th>Rôle</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="text-center">
            @foreach ($users as $user)
              <tr>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->prenom }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->telephone ?? 'N/A' }}</td>
                <td>{{ $user->role->libelle ?? 'Non défini' }}</td>
                <td>
                  <a href="{{ route('user.details', $user->id) }}" class="btn btn-info btn-sm mb-1">Détails</a>
                  <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm mb-1">Modifier</a>
                  <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mb-1">Supprimer</button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif

    <div class="text-center mt-4">
      <a href="{{ route('user.creation') }}" class="btn btn-lg me-2" style="background-color: #ff9911; color: #fff; border: none;">
  + Créer un nouvel utilisateur
</a>

    </div>
  </div>
@endsection
