<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller

  
{
    public function index()
    {
        return view('welcome'); // Crée une vue resources/views/dashboard.blade.php
    }
}

