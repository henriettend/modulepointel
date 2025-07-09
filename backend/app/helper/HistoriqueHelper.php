<?php

namespace App\Helpers;

use App\Models\Historique;
use Illuminate\Support\Facades\Auth;

class HistoriqueHelper
{
    public static function enregistrer($description)
    {
        Historique::create([
            'description' => $description,
            'user_id' => Auth::id(),
        ]);
    }
}
