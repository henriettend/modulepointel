<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeEvaluation extends Model
{
    use HasFactory;

    protected $table = 'type_evaluations';

    protected $fillable = [
        'intitule',
        'description',
    ];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class, 'type_evaluation_id');
        // Si le champ foreign key s'appelle différemment, adapte 'type_evaluation_id'
    }
}
