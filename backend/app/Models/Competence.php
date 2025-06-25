<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use HasFactory;

    // Champs autorisés à être remplis via formulaire (mass assignment)
    protected $fillable = [
        'intitule',
        'type',
    ];
}
