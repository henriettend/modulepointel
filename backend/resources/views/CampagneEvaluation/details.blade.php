@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="card-style">
            <h1>Détails de la Campagne</h1>

            <div>
                <div class="label">Titre :</div>
                <div class="value">{{ $campagne->titre }}</div>
            </div>

            <div>
                <div class="label">Type :</div>
                <div class="value">{{ $campagne->type }}</div>
            </div>

            <div>
                <div class="label">Description :</div>
                <div class="value">{{ $campagne->description }}</div>
            </div>

            <div>
                <div class="label">Date de début :</div>
                <div class="value">{{ $campagne->dateDebut }}</div>
            </div>

            <div>
                <div class="label">Date de fin :</div>
                <div class="value">{{ $campagne->dateFin }}</div>
            </div>

            <div>
                <div class="label">Statut :</div>
                <div class="value">{{ $campagne->statut }}</div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('campagneEvaluation.index') }}" 
                   class="btn btn-lg" 
                   style="background-color: #ff9911; color: white; border: none;">
                    Retour à la liste des campagnes
                </a>
            </div>
        </div>
         </div>
        @endsection
   

