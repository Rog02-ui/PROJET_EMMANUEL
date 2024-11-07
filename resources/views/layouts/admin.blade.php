<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Administration - EBB')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Ajoutez d'autres feuilles de style ici -->
    @stack('styles')
</head>
<body>
    @include('admin.partials.nav')

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-4">
        <p>&copy; 2024 EBB - Administration</p>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Ajoutez d'autres scripts ici -->
    @stack('scripts')
</body>
</html>
