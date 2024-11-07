<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);

        // Si le produit existe déjà dans le panier, on incrémente la quantité
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Sinon, on ajoute le produit au panier avec la quantité initiale de 1
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_url
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès !');
    }

    public function update(Request $request, $id)
{
    $cart = session()->get('cart');

    if(isset($cart[$id])) {
        // Vérifier si l'utilisateur clique sur "-" et que la quantité est 1
        if ($cart[$id]['quantity'] == 1 && $request->quantity < 1) {
            // Si la quantité est 1 et que l'utilisateur tente de diminuer, renvoyer une demande de confirmation
            return response()->json([
                'confirm' => true,
                'message' => 'Voulez-vous supprimer cet article ?'
            ]);
        } else {
            // Mettre à jour la quantité si supérieure à 1
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
    }

    return redirect()->route('cart.index')->with('success', 'Quantité mise à jour');
}

    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Article retiré du panier');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('cart.index')->with('success', 'Panier vidé');
    }
}
