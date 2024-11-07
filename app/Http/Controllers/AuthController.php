<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Récupérer les identifiants de connexion
        $credentials = $request->only('email', 'password');

        // Tenter de connecter l'utilisateur
        if (Auth::attempt($credentials)) {
            // Si la connexion réussit, rediriger vers le tableau de bord
            return redirect()->intended('/dashboard');
        }

        // Si la connexion échoue, renvoyer une erreur
        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }
}
