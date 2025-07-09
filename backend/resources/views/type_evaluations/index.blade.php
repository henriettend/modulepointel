@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Liste des types d'évaluation</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('type_evaluations.creation') }}" 
           class="btn btn-primary mb-3"
           title="Ajouter un type d’évaluation">
            <i class="bi bi-plus-lg"></i>
        </a>

        @if($types->count() > 0)
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>Intitulé</th>
                        <th>Description</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                    <tr>
                        <td>{{ $type->intitule }}</td>
                        <td>{{ $type->description }}</td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                {{-- Modifier --}}
                                <a href="{{ route('type_evaluations.modification', $type->id) }}" 
                                   class="btn btn-sm btn-warning d-flex justify-content-center align-items-center"
                                   style="width: 36px; height: 36px; padding: 0;"
                                   title="Modifier">
                                    <i class="bi bi-pencil-square text-dark fs-5"></i>
                                </a>

                                {{-- Détails --}}
                                <a href="{{ route('type_evaluations.details', $type->id) }}" 
                                   class="btn btn-sm btn-info d-flex justify-content-center align-items-center"
                                   style="width: 36px; height: 36px; padding: 0;"
                                   title="Détails">
                                    <i class="bi bi-info-circle text-white fs-5"></i>
                                </a>

                                {{-- Supprimer --}}
                                <form action="{{ route('type_evaluations.suppression', $type->id) }}" 
                                      method="POST" class="d-inline-block"
                                      onsubmit="return confirm('Confirmer la suppression ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger d-flex justify-content-center align-items-center"
                                            style="width: 36px; height: 36px; padding: 0;"
                                            title="Supprimer">
                                        <i class="bi bi-trash text-white fs-5"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Aucun type d'évaluation trouvé.</p>
        @endif
    </div>
@endsection
