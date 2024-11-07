<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login_test');
    }

    public function login(Request $request)
    {
        dd($request);
        // Validation
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion
        if (Auth::attempt($credentials)) {
            // Vérifier si l'utilisateur est un administrateur
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            // Rediriger l'utilisateur vers la page d'accueil
            return redirect()->route('home')->with('success', 'Bienvenue ' . Auth::user()->first_name);
        }

        // Si les informations de connexion sont incorrectes
        return back()->withErrors([
            'email' => 'Les informations de connexion ne sont pas correctes.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken(); // Sécurité contre les attaques CSRF après déconnexion
        return redirect()->route('login');
    }
}
