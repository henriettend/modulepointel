<!-- resources/views/objectifs/liste.blade.php -->
@extends('layouts.master')

@section('content')
  <div class="py-5">
    <div class="card-style">
      <h1>Liste des Objectifs</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Intitulé</th>
            <th>Description</th>
            <th>Pondération</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($objectifs as $objectif)
            <tr>
              <td>{{ $objectif->intitule }}</td>
              <td>{{ $objectif->description }}</td>
              <td>{{ $objectif->ponderation }}</td>
              <td>
                <a href="{{ route('objectifs.details', $objectif->id) }}" class="btn btn-success btn-sm">Voir</a>
<a href="{{ route('objectifs.modification', $objectif->id) }}" class="btn btn-primary">
    Modifier
</a>
                <form action="{{ route('objectifs.destroy', $objectif->id) }}" method="POST" style="display:inline-block">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet objectif ?')">Supprimer</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <a href="{{ route('objectifs.creation') }}" class="btn btn-primary mt-4">Ajouter un Objectif</a>
    </div>
  </div>
@endsection
