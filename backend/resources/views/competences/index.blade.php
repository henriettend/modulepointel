@extends('layouts.master')
@section('content')
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Liste des compétences</h2>
      <a href="{{ route('competences.create') }}" class="btn btn-primary">Ajouter une compétence</a>
    </div>

    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th>Intitulé</th>
          <th>Type</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($competences as $competence)
          <tr>
            <td>{{ $competence->intitule }}</td>
            <td>{{ ucfirst($competence->type) }}</td>
            <td class="text-center">
              <a href="{{ route('competences.modification', $competence->id) }}" class="btn btn-sm btn-warning me-1">Modifier</a>

              <a href="{{ route('competences.details', $competence->id) }}" class="btn btn-sm btn-info me-1">Détails</a>

              <form action="{{ route('competences.suppression', $competence->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Voulez-vous vraiment supprimer cette compétence ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="text-center">Aucune compétence enregistrée.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
