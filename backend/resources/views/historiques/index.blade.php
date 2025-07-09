@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h2>Historique des actions</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Description</th>
                <th>Utilisateur</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiques as $historique)
                <tr>
                    <td>{{ $historique->description }}</td>
                    <td>{{ $historique->user->prenom }} {{ $historique->user->nom }}</td>
                    <td>{{ $historique->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $historiques->links() }}
</div>
@endsection
