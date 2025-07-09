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

    <!-- Total RH -->
    <div class="col-lg-3 col-sm-6">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                    <h3 class="fw-bolder mb-75">{{ $totalRh }}</h3>
                    <span>Total RH</span>
                </div>
                <div class="avatar bg-light-success p-50">
                    <span class="avatar-content">
                        <i data-feather="users" class="font-medium-4"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Liste des utilisateurs</h2>
        <a href="{{ route('user.creation') }}" class="btn btn-success btn-lg d-flex align-items-center gap-1" title="Créer un nouvel utilisateur">
            <i data-feather="plus-circle"></i>
            <span>Créer un utilisateur</span>
        </a>
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
                            <td class="d-flex justify-content-center gap-2">
                                {{-- Voir --}}
                                <a href="{{ route('user.details', $user->id) }}"
                                   class="btn btn-sm btn-info d-inline-flex align-items-center justify-content-center"
                                   style="width: 38px; height: 38px; padding: 0;" title="Voir">
                                    <i data-feather="eye" style="color: white; font-size: 1.2rem;"></i>
                                </a>

                                {{-- Modifier --}}
                                <a href="{{ route('user.edit', $user->id) }}"
                                   class="btn btn-sm btn-warning d-inline-flex align-items-center justify-content-center"
                                   style="width: 38px; height: 38px; padding: 0;" title="Modifier">
                                    <i data-feather="edit-2" style="color: black; font-size: 1.2rem;"></i>
                                </a>

                                {{-- Supprimer --}}
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Confirmer la suppression ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger d-inline-flex align-items-center justify-content-center"
                                            style="width: 38px; height: 38px; padding: 0;" title="Supprimer">
                                        <i data-feather="trash-2" style="color: white; font-size: 1.2rem;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
