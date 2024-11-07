<?php

namespace App\Http\Controllers;

use App\Models\Category; // N'oubliez pas d'importer le modèle Category
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Récupérer toutes les catégories depuis la base de données
        $categories = Category::all();

        // Passer les catégories à la vue
        return view('categories.index', compact('categories'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id); // Trouver la catégorie par ID, ou échouer
        return view('categories.show', compact('category'));
    }

    public function create()
    {
        // Logique pour afficher le formulaire de création de catégorie
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Category::create($validatedData);  // Créer une nouvelle catégorie avec les données validées

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id); // Trouver la catégorie par ID, ou échouer
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $category = Category::findOrFail($id);  // Trouver la catégorie par ID
    $category->update($validatedData);  // Mettre à jour avec les nouvelles données

    return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès.');
}

public function destroy($id)
{
    $category = Category::findOrFail($id);  // Trouver la catégorie par ID
    $category->delete();  // Supprimer la catégorie

    return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
}

}
