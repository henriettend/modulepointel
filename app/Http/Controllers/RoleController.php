<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Affiche la liste des rôles
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Affiche le formulaire de création d’un rôle
     */
    public function create()
    {
        return view('roles.creation');
    }

    /**
     * Enregistre un nouveau rôle
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255|unique:roles,libelle',
        ]);

        Role::create($validated);

        return redirect()->route('roles.index')->with('success', 'Rôle créé avec succès.');
    }

    /**
     * Affiche un rôle spécifique
     */
    public function show(Role $role)
    {
        return view('roles.show', compact('role'));
    }

    /**
     * Affiche le formulaire d’édition d’un rôle
     */
    public function edit(Role $role)
    {
        return view('roles.edit', compact('role'));
    }

    /**
     * Met à jour un rôle existant
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255|unique:roles,libelle,' . $role->id,
        ]);

        $role->update($validated);

        return redirect()->route('roles.index')->with('success', 'Rôle mis à jour avec succès.');
    }

    /**
     * Supprime un rôle
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Rôle supprimé avec succès.');
    }
}
