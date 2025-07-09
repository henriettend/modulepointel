@extends('layouts.master')

@section('content')
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2>Liste des compétences et leurs critères</h2>
      <a href="{{ route('competences.create') }}" class="btn btn-primary" title="Ajouter une compétence">
        <i class="bi bi-plus-lg"></i>
      </a>
    </div>

    @if(session('success'))
      <div class="alert alert-success">
        {{ session('success') }}
      </div>
    @endif

    @forelse($competences as $competence)
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <div>
            <strong>{{ $competence->intitule }}</strong> ({{ ucfirst($competence->type) }})
          </div>
          <div class="d-flex align-items-center gap-1">
            <a href="{{ route('competences.modification', $competence->id) }}" 
               class="btn btn-sm btn-warning" 
               title="Modifier">
              <i class="bi bi-pencil-square"></i>
            </a>
            <a href="{{ route('competences.details', $competence->id) }}" 
               class="btn btn-sm btn-info" 
               title="Détails">
              <i class="bi bi-info-circle"></i>
            </a>
            <form action="{{ route('competences.suppression', $competence->id) }}" 
                  method="POST" class="d-inline" 
                  onsubmit="return confirm('Voulez-vous vraiment supprimer cette compétence ?');">
              @csrf
              @method('DELETE')
              <button type="submit" 
                      class="btn btn-sm btn-danger" 
                      title="Supprimer">
                <i class="bi bi-trash"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="card-body">
          @if($competence->criteres->isEmpty())
            <p class="text-muted">Aucun critère pour cette compétence.</p>
          @else
            <ul class="list-group">
              @foreach($competence->criteres as $critere)
                <li class="list-group-item">
                  <strong>{{ $critere->titre }}</strong> — {{ $critere->description }}
                </li>
              @endforeach
            </ul>
          @endif
        </div>
      </div>
    @empty
      <p class="text-center">Aucune compétence enregistrée.</p>
    @endforelse
  </div>
@endsection
