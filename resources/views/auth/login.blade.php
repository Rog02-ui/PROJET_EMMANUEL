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

    <style>
        .password-container {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .social-login .btn {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .social-login .btn i {
            margin-right: 8px;
        }

        .btn-info {
            background-color: tomato;
            color: white;
            border: black;
        }



    </style>
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
                    <i class="toggle-password fas fa-eye" onclick="togglePassword('password')"></i>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
        </form>

        <!-- Connexion via réseaux sociaux -->
        <div class="social-login mt-4">
            <p class="text-center">Connectez-vous avec :</p>
            <a href="{{ route('login.google') }}" class="btn btn-danger btn-block mb-2">
                <i class="fab fa-google"></i> Google
            </a>
            <a href="{{ route('login.facebook') }}" class="btn btn-primary btn-block mb-2">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
            <a href="{{ route('login.instagram') }}" class="btn btn-info btn-block">
                <i class="fab fa-instagram"></i> Instagram
            </a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Fonction pour afficher/cacher le mot de passe -->
<script>
    function togglePassword(id) {
        const passwordField = document.getElementById(id);
        const icon = passwordField.nextElementSibling;
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.ad   d('fa-eye-slash');
        } else {
            passwordField.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>

</body>
</html>
