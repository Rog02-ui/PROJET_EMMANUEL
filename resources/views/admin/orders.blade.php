<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Commandes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('admin.partials.nav')

    <main>
        <div class="container">
            <h1>Gestion des Commandes</h1>
            <p>Liste des commandes effectuées par les clients.</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Numéro de commande</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Montant total</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemple de boucle pour les commandes -->
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->created_at->format('d/m/Y') }}</td>
                            <td>{{ $order->total }} €</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-primary">Voir</a>
                                <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn btn-warning">Modifier</a>
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
