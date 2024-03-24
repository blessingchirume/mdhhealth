<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $designations = Designation::all();
        $roles = Role::all();
        return view('users.create', compact('designations', 'roles'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'designation_id' => 'required'
        ]);
        try {
            $user = new User();
            $user->create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'branch_id' => 0,
                'designation_id' => $request->designation_id,
                'password' => Hash::make('12345678')
            ]);

            return redirect()->route('users.index')->with('success', 'user created successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $designations = Designation::all();
        return view('users.edit', compact('user', 'roles', 'designations'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('users.show', compact('user', 'roles'));
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'user deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error', $th->getMessage());
        }
    }

    public function update(Request $request, User $user)
    {
        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            // 'phone' => 'required'
        ]);
        try {
            $user->update([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
            ]);

            return redirect()->route('users.index')->with('success', 'user updated successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function assignRole(Request $request, User $user)
    {
        try {
            $user->assignRole(Role::findByName($request->role));
            return redirect()->route('users.index')->with('success', 'user role assigned successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
