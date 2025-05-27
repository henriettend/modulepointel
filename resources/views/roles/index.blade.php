@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Liste des rôles</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('roles.creation') }}" class="btn btn-primary mb-3">Créer un rôle</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
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
                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-sm btn-warning me-2">Modifier</a>

                        <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce rôle ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Aucun rôle trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
