<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   // App\Http\Controllers\HomeController.php

public function index()
{
    $popularProducts = Product::where('is_popular', 1)->take(8)->get();

    // Vérifiez si les produits populaires sont récupérés
    if ($popularProducts->isEmpty()) {
        dd("Aucun produit populaire trouvé.");
    }

    return view('home', [
        'popularProducts' => $popularProducts,
    ]);
}


}

