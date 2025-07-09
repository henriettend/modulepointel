<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CritereEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'competence_id', 
    ];

    /**
     * Chaque critère appartient à une compétence.
     */
    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }
}
