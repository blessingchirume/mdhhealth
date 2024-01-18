<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleController extends Controller
{

    public function index()
    {
        $collection = Role::all();
        return view('layouts.permision.index', compact('collection'));
    }

    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        return back()->with('success', 'role created');
    }

    public function show($id)
    {
        $role = Role::where('id', $id)->first();
        $permissions = $role->permissions()->get();
        $availablePermissions = Permission::all();

        return view('layouts.permision.view', compact('role', 'permissions', 'availablePermissions'));
    }

    public function givePermission(Request $request, $id)
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        $role = Role::where('id', $id)->first();

        $role->givePermissionTo($request->name);

        return back()->with('success', 'permission assigned successfully');
    }
    public function createPermission(Request $request)
    {
        $permission = Permission::create(["name" => $request->name]);
        return back();
    }


    public function revokePermission($role, $permission)
    {
        $role->revokePermissionTo($permission->name);
        return redirect('/admin/roles/' . $role);
    }

    public function update() {
        
    }
    public function destroy() {
        
    }
}
