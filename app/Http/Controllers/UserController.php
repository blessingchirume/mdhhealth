<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Designation;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $designations = Designation::all();
        return view('users.create', compact('roles', 'designations'));
    }

    public function store()
    {
        User::create(request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'role_id'=> 'required',
            'designation_id'=> 'required',
            'password'=> bcrypt('password123'),
        ])
    );
        return redirect()->back()->with('success', 'User created successfully, with default password `password123`');
    }
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $user->update(request()->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
        ]));
        return redirect()->back()->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
