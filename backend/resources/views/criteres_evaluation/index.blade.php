@extends('layouts.master')

@section('content')
  <div class="container mt-5">
    <h3 class="mb-4">Liste des critères d’évaluation</h3>

    <div class="mb-3">
      <a href="{{ route('criteres_evaluation.creation') }}"
         class="btn btn-success"
         title="Ajouter un critère">
        <i class="bi bi-plus-lg"></i>
      </a>
    </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($criteres->isEmpty())
      <p>Aucun critère d’évaluation trouvé.</p>
    @else
      <table class="table table-bordered table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Titre</th>
            <th>Description</th>
            <th class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($criteres as $critere)
            <tr>
              <td>{{ $critere->id }}</td>
              <td>{{ $critere->titre }}</td>
              <td>{{ Str::limit($critere->description, 50) }}</td>
              <td class="text-center">
                <div class="d-flex justify-content-center gap-2">
                
                  <a href="{{ route('criteres_evaluation.details', $critere->id) }}"
                     class="btn btn-sm btn-info d-flex justify-content-center align-items-center"
                     style="width: 36px; height: 36px; padding: 0;"
                     title="Voir">
                    <i class="bi bi-eye text-white fs-5"></i>
                  </a>

                  <a href="{{ route('criteres_evaluation.modification', $critere->id) }}"
                     class="btn btn-sm btn-warning d-flex justify-content-center align-items-center"
                     style="width: 36px; height: 36px; padding: 0;"
                     title="Modifier">
                    <i class="bi bi-pencil-square text-dark fs-5"></i>
                  </a>

                  <form action="{{ route('criteres_evaluation.suppression', $critere->id) }}"
                        method="POST"
                        style="display:inline-block;"
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
    @endif
  </div>
@endsection
