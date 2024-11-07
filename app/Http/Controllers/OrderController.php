<?php

namespace App\Http\Controllers;

use App\Models\Order; // Assurez-vous d'importer le modèle Order
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Code pour afficher toutes les commandes
    }

    public function show($id)
    {
        // Code pour afficher une commande spécifique
    }

    public function create()
    {
        // Code pour afficher un formulaire de création de commande
    }

    public function store(Request $request)
    {
        // Code pour stocker une nouvelle commande
    }

    public function edit($id)
    {
        // Code pour afficher un formulaire de modification de commande
    }

    public function update(Request $request, $id)
    {
        // Code pour mettre à jour une commande existante
    }

    public function destroy($id)
    {
        // Code pour supprimer une commande
    }
}