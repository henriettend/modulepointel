<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objectif extends Model
{
    use HasFactory;

    // Liste des champs autorisés à être remplis automatiquement
    protected $fillable = [
        'intitule',
        'description',
        'ponderation'
    ];
}
