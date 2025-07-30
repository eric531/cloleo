<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class adminUserController extends Controller
{
    //
    public function showLoginForm()
    {
        // S'il est déjà connecté et admin, rediriger vers le dashboard
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.admin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('admin.login')->with('error', 'Accès réservé aux administrateurs.');
            }
        }

        return redirect()->route('admin.login')->with('error', 'Email ou mot de passe invalide.');
    }

    public function dashboard()
    {
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect()->route('admin.login')->with('error', 'Veuillez vous connecter en tant qu\'admin.');
        }

        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Déconnexion réussie.');
    }






    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
          
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string',

        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'image' => $request->image ?? null,
            'password' => $request->password ?? null,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('users', 'public');
        }

        $user->update($data);

        if ($request->has('isadmin')) {
            $user->syncRoles([$request->isadmin]);
        }

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur: ' . $user->name . ' mis à jour.');
    }

    public function destroy(User $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.users.index')->with('error', 'Impossible de supprimer un admin.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur: ' . $user->name . ' supprimé.');
    }

}
