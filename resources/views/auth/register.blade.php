<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Formulaire d'inscription -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Créer un compte</h2>

            <!-- Afficher les erreurs de validation -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">

            @csrf <!-- Protection CSRF -->
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Entrez votre prénom" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name">Nom</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Entrez votre nom" required>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
                </div>
                <div class="form-group mb-3">
                    <label for="phone">Téléphone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" required>
                </div>
                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmez votre mot de passe" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">S'inscrire</button>
            </form>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
