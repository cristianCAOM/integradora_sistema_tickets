<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = ['admin' => 'Administrador', 'technician' => 'Técnico', 'user' => 'Usuario'];
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,technician,user',
        ]);
    
        // Actualizar el rol del usuario
        $user->update($request->all());
    
        // Actualizar el campo is_admin basado en el rol
        if ($request->role == 'admin') {
            $user->is_admin = 1;
        } else {
            $user->is_admin = 0;
        }
        $user->save();
    
        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado exitosamente.');
    }
    
public function makeAdmin(User $user)
{
    // Asignar el rol de administrador
    $adminRole = Role::where('name', 'admin')->first();
    $user->roles()->sync([$adminRole->id]);

    // Actualizar el campo is_admin
    $user->is_admin = 1;
    $user->save();

    return redirect()->route('admin.users.index')->with('success', 'El usuario ahora es administrador.');
}
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    
}