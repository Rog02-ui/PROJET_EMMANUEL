@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
    <div class="container">
        <h1>Tableau de Bord</h1>
        <p>Bienvenue sur le tableau de bord administratif d'EBB. Vous pouvez gérer les utilisateurs, les produits, les commandes, et bien plus encore.</p>

        <div class="grid grid-cols-3 gap-6">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2>Utilisateurs</h2>
                <p>Gérer les utilisateurs inscrits.</p>
                <a href="{{ route('admin.users') }}" class="btn btn-primary">Voir les utilisateurs</a>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2>Produits</h2>
                <p>Gérer les produits disponibles sur la plateforme.</p>
                <a href="{{ route('admin.products') }}" class="btn btn-primary">Voir les produits</a>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2>Commandes</h2>
                <p>Gérer les commandes des clients.</p>
                <a href="{{ route('admin.orders') }}" class="btn btn-primary">Voir les commandes</a>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2>Catégories</h2>
                <p>Gérer les catégories de produits.</p>
                <a href="{{ route('admin.categories') }}" class="btn btn-primary">Voir les catégories</a>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2>Paramètres</h2>
                <p>Configurer les paramètres de la plateforme.</p>
                <a href="{{ route('admin.settings') }}" class="btn btn-primary">Voir les paramètres</a>
            </div>
        </div>
    </div>
@endsection
