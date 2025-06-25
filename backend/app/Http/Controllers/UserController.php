<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Afficher la liste des utilisateurs.
     */
   public function index()
{
    $users = User::all();
    $totalUsers = $users->count();

    $totalManagers = User::whereHas('role', function ($query) {
        $query->where('libelle', 'manager');
    })->count();

    $totalEmployes = User::whereHas('role', function ($query) {
        $query->where('libelle', 'employe');
    })->count();

    $totalRh = User::whereHas('role', function ($query) {
        $query->where('libelle', 'rh');
    })->count();

    return view('users.index', compact('users', 'totalUsers', 'totalManagers', 'totalEmployes', 'totalRh'));
}




    /**
     * Afficher le formulaire de création d'un utilisateur.
     */
    public function create()
    {
        $roles = Role::all(); // Récupérer tous les rôles
        return view('users.creation', compact('roles'));
    }

    /**
     * Enregistrer un nouvel utilisateur.
     */
    public function store(Request $request)
    {
        // Validation des données reçues
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'nullable|string|max:15',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
        ]);

        // Création et sauvegarde de l'utilisateur
        $user = new User();
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->email = $validated['email'];
        $user->telephone = $validated['telephone'] ?? null;
        $user->password = Hash::make($request->password);
        $user->role_id = $validated['role']; // Assurez-vous que le champ role_id existe dans votre table users
        $user->save();

        return redirect()->route('user.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Afficher un utilisateur (non implémenté).
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Afficher le formulaire d'édition d'un utilisateur.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.modification', compact('user', 'roles'));
    }

    /**
     * Mettre à jour un utilisateur.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'telephone' => 'nullable|string|max:15',
            'role' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->nom = $validated['nom'];
        $user->prenom = $validated['prenom'];
        $user->email = $validated['email'];
        $user->telephone = $validated['telephone'] ?? null;
        $user->role_id = $validated['role'];
        $user->save();

        return redirect()->route('user.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprimer un utilisateur.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function details(string $id)
{
    $user = User::with('role')->findOrFail($id);
    return view('users.details', compact('user'));
}

}
