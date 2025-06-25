@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="card shadow rounded">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Détails de l'utilisateur</h4>
            </div>
            <div class="card-body">
                <p><strong>Nom :</strong> {{ $user->nom }}</p>
                <p><strong>Prénom :</strong> {{ $user->prenom }}</p>
                <p><strong>Email :</strong> {{ $user->email }}</p>
                <p><strong>Téléphone :</strong> {{ $user->telephone ?? 'Non renseigné' }}</p>
                <p><strong>Rôle :</strong> {{ $user->role->libelle ?? 'Aucun rôle' }}</p>
            </div>
            <div class="card-footer text-end">
<a href="{{ route('user.index') }}" class="btn btn-secondary">
  &larr; Retour à la liste
</a>
            </div>
        </div>
    </div>
    @endsection

   
