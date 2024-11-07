<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complétez votre profil</title>
</head>
<body>
    <h2>Complétez votre profil</h2>
    <form method="POST" action="{{ route('register.complete') }}">
        @csrf
        <div>
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" id="first_name" required>
        </div>
        <div>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name" id="last_name" required>
        </div>
        <div>
            <label for="email">Email (si non fourni)</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" @if(session('email_or_phone')) disabled @endif>
        </div>
        <div>
            <label for="gender">Sexe</label>
            <select name="gender" id="gender" required>
                <option value="male">Homme</option>
                <option value="female">Femme</option>
                <option value="other">Autre</option>
            </select>
        </div>
        <div>
            <label for="birthdate">Date de naissance</label>
            <input type="date" name="birthdate" id="birthdate" required>
        </div>
        <div>
            <input type="checkbox" name="terms" id="terms" required>
            <label for="terms">J'accepte la politique de confidentialité</label>
        </div>
        <button type="submit">Continuer</button>
    </form>
</body>
</html>
