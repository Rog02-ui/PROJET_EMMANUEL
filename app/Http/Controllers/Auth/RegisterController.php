<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // Retourne la vue du formulaire d'inscription
    }

    public function register(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|string|max:191|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        
        dd($request->all()); // Ajoutez ceci pour déboguer

        // Création d'un nouvel utilisateur
        // Création de l'utilisateur avec assignation de masse
    $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make($request->password), // Hachage du mot de passe
    ]);

        // Authentification automatique après l'inscription
        Auth::login($user);

        return redirect()->route('home'); // Redirige l'utilisateur vers la page d'accueil
    }
}
