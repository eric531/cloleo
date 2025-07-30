<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function showLoginForm()
    {
        // S'il est déjà connecté et n'est pas admin, rediriger vers le dashboard client
        if (Auth::check() && Auth::user()->is_admin == 0) {
            return redirect()->route('client.dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin == 0) {
                return redirect()->route('dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Accès réservé aux clients.');
            }
        }

        return redirect()->route('login')->with('error', 'Email ou mot de passe invalide.');
    }

    public function dashboard()
    {
        if (!Auth::check() || Auth::user()->is_admin == 1) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter en tant qu\'client.');
        }

        return view('client.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Déconnexion réussie.');
    }
    




    public function profile()
    {   $user = auth()->user();

        return view('client.profile',compact('user'));
    }

    public function reviews()
    {
        $user = auth()->user();
        $data['reviews'] = $user->reviews()->with('product')->get();
        return view('client.reviews', $data);
    }

    public function favorites()
    {
        $user = auth()->user();
        $data['favorites'] = $user->favorites()->with('product')->get();
        return view('client.favorites', $data);
    }

    public function orders()
    {   $user = auth()->user();
        $data['orders'] = $user->orders()->with('products')->get();
        return view('client.orders', $data);
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'image' => $request->image ?? null,
            'password' => $request->password ?? null,
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('users', 'public');
        }

        $request->user()->update($data);

        return redirect()->route('client.profile')->with('success', 'Profile mis à jour.');
    }
}
