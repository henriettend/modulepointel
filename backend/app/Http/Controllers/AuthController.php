<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche la page de connexion.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Traite la connexion de l'utilisateur.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login-email' => ['required', 'email'],
            'login-password' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['login-email'], 'password' => $credentials['login-password']])) {
            $request->session()->regenerate();

            // Redirection vers la route 'dashboard.index' (la page welcome)
            return redirect()->intended(route('dashboard.index'));
        }

        return back()->withErrors([
            'login-email' => 'Les informations d’identification ne correspondent pas.',
        ]);
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige vers la page de connexion
        return redirect()->route('login');
    }
}
