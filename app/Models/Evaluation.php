<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    // Champs autorisés à l'assignation en masse
    protected $fillable = [
        'titre',
        'description',
        'dateDebut',
        'dateFin',
        'statut',
        'user_id',
        'manager_id',
        'campagne_evaluations_id',
    ];

    /**
     * L'utilisateur évalué (probablement un employé).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Le manager qui évalue.
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * La campagne d'évaluation à laquelle appartient cette évaluation.
     */
    public function campagne()
    {
        return $this->belongsTo(CampagneEvaluation::class, 'campagne_evaluations_id');
    }
}
