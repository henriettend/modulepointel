<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest; 
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    
    public function create(): View
    {
        // Affiche la page de connexion 
        return view('auth.login');
    }

    
    public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();

    return redirect()->intended(route('dashboard'));
}

   


    public function destroy(Request $request): RedirectResponse
    {
        // Déconnecte l'utilisateur
        Auth::guard('web')->logout();

        // Invalide la session actuelle
        $request->session()->invalidate();

        // Regénère le token CSRF pour la sécurité
        $request->session()->regenerateToken();

        // Redirige vers la page d'accueil ou de connexion
        return redirect('/connexion');
    }
}
