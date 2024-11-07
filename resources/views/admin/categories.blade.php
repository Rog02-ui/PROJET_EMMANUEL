<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Catégories</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('admin.partials.nav')

    <main>
        <div class="container">
            <h1>Gestion des Catégories</h1>
            <p>Liste des catégories de produits.</p>

            <a href="{{ route('admin.categories.create') }}" class="btn btn-success mb-4">Ajouter une catégorie</a>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemple de boucle pour les catégories -->
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Modifier</a>
                                <a href="{{ route('admin.categories.delete', $category->id) }}" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>

    <footer class="text-center py-4">
        <p>&copy; 2024 EBB - Administration</p>
    </footer>
</body>
</html>
