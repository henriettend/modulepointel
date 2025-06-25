@extends('layouts.master')

@section('content')
<body>
    <div class="container mt-5">
        <h1>Ajouter un type d'évaluation</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('type_evaluations.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="intitule" class="form-label">Intitulé</label>
                <input type="text" class="form-control" id="intitule" name="intitule" value="{{ old('intitule') }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
            <a href="{{ route('type_evaluations.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
