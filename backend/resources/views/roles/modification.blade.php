@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Modifier le rôle</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('roles.update', $role) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="libelle" class="form-label">Libellé</label>
            <input 
                type="text" 
                class="form-control @error('libelle') is-invalid @enderror" 
                name="libelle" 
                id="libelle" 
                value="{{ old('libelle', $role->libelle) }}" 
                required
                autofocus
            >
            @error('libelle')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary ms-2">Annuler</a>
    </form>
</div>
@endsection
