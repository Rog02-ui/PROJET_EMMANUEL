<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Méthode pour afficher les produits par catégorie
    public function category($category_id)
    {
        // Rechercher les produits correspondant à l'ID de la catégorie
        $products = Product::where('category_id', $category_id)->get();

        // Retourner la vue avec les produits de la catégorie
        return view('products.category', compact('products'));
    }

    // Méthode pour afficher les produits correspondant à une catégorie et à un type spécifique
    public function showCategoryProducts($category, $product)
    {
        // Trouver la catégorie par nom
        $categoryModel = Category::where('name', $category)->first();

        if (!$categoryModel) {
            // Si la catégorie n'existe pas, afficher une page de "Non trouvé"
            return view('products.not_found', ['category' => $category, 'product' => $product]);
        }

        // Récupérer les produits de cette catégorie qui correspondent au nom du produit
        $products = Product::where('category_id', $categoryModel->id)
                           ->where('name', 'LIKE', "%{$product}%")
                           ->get();

        // Si aucun produit n'est trouvé, retourner une vue vide ou un message
        if ($products->isEmpty()) {
            return view('products.not_found', ['category' => $category, 'product' => $product]);
        }

        // Retourner la vue avec les produits trouvés
        return view('products.category', ['products' => $products, 'category' => $category, 'product' => $product]);
    }

    // Méthode pour afficher les favoris
    public function favorites()
    {
        // Vérifier si l'utilisateur est authentifié
        $user = auth()->user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['message' => 'Vous devez être connecté pour voir vos favoris.']);
        }

        // Récupérer les favoris de l'utilisateur
        $favorites = $user->favorites()->get();

        // Retourner la vue avec les favoris de l'utilisateur
        return view('user.favorites', compact('favorites'));
    }

    // Méthode pour la recherche de produits
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Remplace les caractères accentués pour éviter des erreurs dans la recherche
        $query = str_replace(['à', 'é', 'è', 'ù', 'ç'], ['a', 'e', 'e', 'u', 'c'], $query);

        // Rechercher le produit correspondant
        $product = Product::where('name', 'LIKE', "%{$query}%")->first();
        return response()->json($products);

        if ($product) {
            // Si le produit est trouvé, redirige vers sa page
            return redirect()->route('products.show', ['id' => $product->id]);
        } else {
            // Si aucun produit n'est trouvé, retourne un message d'erreur
            return redirect()->back()->with('error', 'Produit non trouvé');
        }
    }

    // Affiche les détails d'un produit
    public function show($id)
    {
        // Trouver le produit par son ID
        $product = Product::find($id);

        // Vérifiez si le produit existe
        if (!$product) {
            abort(404, 'Produit non trouvé');
        }

        // Retourner la vue avec les détails du produit
        return view('products.show', compact('product'));
    }

    // Méthode pour afficher la page d'accueil avec les produits populaires
    public function index(Request $request)
    {
        // Si une catégorie est sélectionnée, filtrer par catégorie
        if ($request->has('category')) {
            $products = Product::where('category_id', $request->input('category'))->get();
        } else {
            $products = Product::all();
        }

        // Récupérer les produits populaires
        $popularProducts = Product::where('popular', true)->take(8)->get(); // Limiter à 8 produits populaires

        // Passer les produits à la vue
        return view('products.index', compact('products', 'popularProducts'));
    }

    // Méthode pour afficher le formulaire de création d'un produit
    public function create()
    {
        return view('product.create');
    }

    // Méthode pour enregistrer un nouveau produit
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Créer et enregistrer le produit
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->vendor_id = auth()->user()->id; // Associer le produit au vendeur

        // Enregistrer l'image si elle est téléchargée
        if ($request->hasFile('image')) {
            $product->image_url = $request->file('image')->store('products');
        }

        $product->save();

        // Redirection après succès
        return redirect()->back()->with('success', 'Produit ajouté avec succès!');
    }

    // Méthode pour mettre à jour un produit
    public function update(Request $request, $id)
    {
        // Logique de mise à jour du produit à venir
    }

    // Méthode pour supprimer un produit
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Produit supprimé avec succès!');
    }
}
