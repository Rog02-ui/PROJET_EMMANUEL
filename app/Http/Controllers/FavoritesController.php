<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assurez-vous d'importer le modèle du produit
use Illuminate\Support\Facades\Auth;

class FavoritesController extends Controller
{
    public function addToFavorites($productId)
    {
        $user = Auth::user();

        if ($user) {
            // Ajouter le produit aux favoris de l'utilisateur
            $user->favorites()->attach($productId);

            return response()->json(['message' => 'Produit ajouté aux favoris'], 200);
        }

        return response()->json(['message' => 'Utilisateur non connecté'], 401);
    }

    public function removeFromFavorites($productId)
    {
        $user = Auth::user();

        if ($user) {
            // Retirer le produit des favoris de l'utilisateur
            $user->favorites()->detach($productId);

            return response()->json(['message' => 'Produit retiré des favoris'], 200);
        }

        return response()->json(['message' => 'Utilisateur non connecté'], 401);
    }
}
