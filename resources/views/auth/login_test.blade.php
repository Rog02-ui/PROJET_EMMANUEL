<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4">
        <h2 class="text-center mb-4">Se connecter</h2>

        <!-- Formulaire de connexion -->
        <form method="POST" action="{{ route('login.perform') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email ou Téléphone</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Entrez votre email ou téléphone" required>
            </div>

            <div class="form-group mb-3">
                <label for="password">Mot de passe</label>
                <div class="password-container">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form>


    </div>
</div>
</body>
</html>

