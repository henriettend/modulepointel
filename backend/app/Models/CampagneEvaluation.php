<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampagneEvaluation extends Model
{
    use HasFactory;

    protected $table = 'campagne_evaluations';

    protected $fillable = [
        'titre',
        'description',
        'dateDebut',
        'dateFin',
        'statut',
        'type',
    ];
}
