<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'dateDebut',
        'dateFin',
        'statut',
        'user_id',
        'manager_id',
        'campagne_evaluations_id',
        'type_evaluation_id',
    ];
    

    // L'utilisateur évalué (probablement un employé).
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Le manager qui évalue.
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    // La campagne d'évaluation liée.
    public function campagne()
    {
        return $this->belongsTo(CampagneEvaluation::class, 'campagne_evaluations_id');
    }

    // Le type d'évaluation associé.
    public function typeEvaluation()
    {
        return $this->belongsTo(TypeEvaluation::class, 'type_evaluation_id');
    }

    // Compétences associées à cette évaluation.
    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'competence_evaluation', 'evaluation_id', 'competence_id');
    }
}
