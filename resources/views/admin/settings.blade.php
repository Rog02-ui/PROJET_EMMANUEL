<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Paramètres</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('admin.partials.nav')

    <main>
        <div class="container">
            <h1>Paramètres de la Plateforme</h1>
            <p>Configurer les paramètres globaux du site.</p>

            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <!-- Exemple de formulaire pour les paramètres -->
                <div class="mb-4">
                    <label for="site_name">Nom du site</label>
                    <input type="text" id="site_name" name="site_name" class="input" value="{{ $settings->site_name ?? '' }}">
                </div>

                <div class="mb-4">
                    <label for="site_email">Email de contact</label>
                    <input type="email" id="site_email" name="site_email" class="input" value="{{ $settings->site_email ?? '' }}">
                </div>

                <div class="mb-4">
                    <label for="site_phone">Numéro de téléphone</label>
                    <input type="text" id="site_phone" name="site_phone" class="input" value="{{ $settings->site_phone ?? '' }}">
                </div>

                <button type="submit" class="btn btn-success">Enregistrer les paramètres</button>
            </form>
        </div>
    </main>

    <footer class="text-center py-4">
        <p>&copy; 2024 EBB - Administration</p>
    </footer>
</body>
</html>
