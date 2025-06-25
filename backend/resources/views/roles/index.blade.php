@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card-style">
            <h1>Liste des Rôles</h1>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Libellé</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->libelle }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-warning me-2" title="Modifier">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Supprimer">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="empty-msg text-center">Aucun rôle enregistré.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <a href="{{ route('roles.creation') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> Créer un rôle
                </a>
            </div>
        </div>
    </div>
@endsection
