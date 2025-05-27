<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Par défaut, Laravel utilise le nom de la table au pluriel 'roles', donc pas besoin de le redéfinir

    // Champs autorisés à la création ou mise à jour
    protected $fillable = [
        'libelle',
    ];
}
