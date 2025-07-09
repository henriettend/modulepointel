@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card p-4 shadow-sm rounded-3">
            <h2 class="mb-4 text-primary">Liste des Rôles</h2>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Libellé</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->libelle }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">

                                        {{-- Détails --}}
                                        <a href="{{ route('roles.details', $role->id) }}"
                                           class="btn btn-sm btn-info d-inline-flex align-items-center justify-content-center"
                                           style="width: 38px; height: 38px; padding: 0;"
                                           title="Détails">
                                            <i class="bi bi-info-circle text-white fs-5"></i>
                                        </a>

                                        {{-- Modifier --}}
                                        <a href="{{ route('roles.modification', $role->id) }}"
                                           class="btn btn-sm btn-warning d-inline-flex align-items-center justify-content-center"
                                           style="width: 38px; height: 38px; padding: 0;"
                                           title="Modifier">
                                            <i class="bi bi-pencil-square text-dark fs-5"></i>
                                        </a>

                                        {{-- Supprimer --}}
                                        <form action="{{ route('roles.suppression', $role->id) }}"
                                              method="POST"
                                              class="d-inline-block"
                                              onsubmit="return confirm('Confirmer la suppression ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-sm btn-danger d-inline-flex align-items-center justify-content-center"
                                                    style="width: 38px; height: 38px; padding: 0;"
                                                    title="Supprimer">
                                                <i class="bi bi-trash text-white fs-5"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Aucun rôle enregistré.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('roles.creation') }}"
                   class="btn btn-lg"
                   style="background-color: #ff9911; color: white;"
                   title="Ajouter un rôle">
                    <i class="bi bi-plus-lg fs-4"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
