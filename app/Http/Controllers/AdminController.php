<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Affiche le tableau de bord de l'admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Affiche la liste des utilisateurs
    public function users()
    {
        // Récupérer les utilisateurs depuis la base de données
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Affiche la liste des produits
    public function products()
    {
        // Récupérer les produits depuis la base de données
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    // Affiche la liste des catégories
    public function categories()
    {
        // Récupérer les catégories depuis la base de données
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    // Affiche la liste des commandes
    public function orders()
    {
        // Récupérer les commandes depuis la base de données
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    // Affiche les paramètres de l'admin
    public function settings()
    {
        return view('admin.settings');
    }
}
