<?php

namespace App\Models; // ← À ne pas oublier

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CritereEvaluation;

class Competence extends Model
{
    use HasFactory;

    protected $fillable = [
        'intitule',
        'type',
    ];

    public function criteres()
    {

    return $this->hasMany(CritereEvaluation::class, 'competence_id');    }
    
}




