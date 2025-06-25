<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\CampagneEvaluation;


class GrilleEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [

        'titre',
        'description',
        'campagne_evaluations_id',
    ];

    /**
     * Relation avec la table type_evaluations.
     * Une grille appartient à une campagne d'évaluation
     */

public function campagne()
{
    return $this->belongsTo(CampagneEvaluation::class, 'campagne_evaluations_id');
}

}
