<?php

namespace App\Http\Controllers;

use App\Models\Historique;

class HistoriqueController extends Controller
{
    public function index()
    {
        $historiques = Historique::with('user')->latest()->paginate(10);
        return view('historiques.index', compact('historiques'));
    }
}
