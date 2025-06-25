<!-- resources/views/objectifs/details.blade.php -->
<@extends('layouts.master')

@section('content')
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card bg-white">
          <h1 class="card-title">Détail de l'Objectif</h1>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>ID :</strong> {{ $objectif->id }}</li>
            <li class="list-group-item"><strong>Intitulé :</strong> {{ $objectif->intitule }}</li>
            <li class="list-group-item"><strong>Description :</strong> {{ $objectif->description }}</li>
            <li class="list-group-item"><strong>Pondération :</strong> {{ $objectif->ponderation }}</li>
          </ul>
          <a href="{{ route('objectifs.index') }}" class="btn btn-secondary btn-back">
            <i class="bi bi-arrow-left"></i> Retour à la liste
          </a>
        </div>
      </div>
    </div>
  </div>
@endsection
