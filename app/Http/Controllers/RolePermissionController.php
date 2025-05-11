<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RolePermissionController extends Controller
{
    // public function __construct()
    // {
    //     $this->Middleware(['auth', 'verified', 'role:Admin']);
    // }
    public function index()
    {
        $roles = Role::with('permissions')->orderBy('name')->get();
        $permissions = Permission::orderBy('name')->get();
        return view('view_admin.rolespermissions.list', compact('roles', 'permissions'));
    }

    public function create()
    {
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();
        
        return view('view_admin.rolespermissions.ajouter', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);

        Role::create(['name' => $request->name]);

        return redirect()->route('roles.index')
            ->with('success', 'Rôle créé avec succès.');
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id'
        ]);

        $permissions = Permission::whereIn('id', $request->permissions ?? [])->get();
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')
            ->with('success', 'Permissions mises à jour avec succès.');
    }

    public function delete(Role $role)
    {
        if (in_array($role->name, ['Admin', 'Entrepreneur'])) {
            return redirect()->route('roles.index')
                ->with('error', 'Impossible de supprimer un rôle système.');
        }

        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rôle supprimé avec succès.');
    }
}