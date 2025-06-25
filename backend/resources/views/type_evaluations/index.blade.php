@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Liste des types d'évaluation</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('type_evaluations.creation') }}" class="btn btn-primary mb-3">Ajouter un type</a>

        @if($types->count() > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Intitulé</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                    <tr>
                        <td>{{ $type->intitule }}</td>
                        <td>{{ $type->description }}</td>
                        <td>
                            <a href="{{ route('type_evaluations.modification', $type->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="{{ route('type_evaluations.details', $type->id) }}" class="btn btn-sm btn-info">Détails</a>
                            <form action="{{ route('type_evaluations.suppression', $type->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Supprimer</button>
                            </form>
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
