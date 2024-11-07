{{-- resources/views/menu.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Déroulant</title>
    <!-- Inclure les styles -->
    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="menu-container">
        <!-- Menu principal -->
        <div class="main-menu">
            <ul>
                <li data-category="electronics">Électronique</li>
                <li data-category="fashion">Mode</li>
                <li data-category="home">Maison</li>
                <li data-category="sports">Sports</li>
                <li data-category="books">Livres</li>
                <!-- Ajoutez d'autres catégories ici -->
            </ul>
        </div>

        <!-- Sous-menu -->
        <div class="submenu" id="submenu">
            <!-- Les sous-catégories seront affichées ici dynamiquement -->
        </div>
    </div>

    <!-- Inclure le script -->
    <script>
        // Données des sous-catégories
        const categories = {
            electronics: [
                { name: 'Téléphones', image: '{{ asset("images/telephone.jpg") }}' },
                { name: 'Ordinateurs', image: '{{ asset("images/ordinateur.jpg") }}' },
                { name: 'Appareils Photos', image: '{{ asset("images/appareil-photo.jpg") }}' },
                { name: 'Casques', image: '{{ asset("images/casque.jpg") }}' },
                { name: 'Écouteurs sans fil', image: '{{ asset("images/ecouteurs.jpg") }}' },
                { name: 'Caméras', image: '{{ asset("images/camera.jpg") }}' }
            ],
            fashion: [
                { name: 'Jeans', image: '{{ asset("images/jeans.jpg") }}' },
                { name: 'Robes', image: '{{ asset("images/robe.jpg") }}' },
                { name: 'Chaussures', image: '{{ asset("images/chaussures.jpg") }}' },
                { name: 'Accessoires', image: '{{ asset("images/accessoires.jpg") }}' }
            ],
            home: [
                { name: 'Meubles', image: '{{ asset("images/meubles.jpg") }}' },
                { name: 'Décoration', image: '{{ asset("images/decoration.jpg") }}' },
                { name: 'Électroménager', image: '{{ asset("images/electromenager.jpg") }}' }
            ]
            // Ajoutez d'autres catégories ici
        };

        // Sélection des éléments du menu
        const menuItems = document.querySelectorAll('.main-menu ul li');
        const submenu = document.getElementById('submenu');

        // Gestion du survol des catégories principales
        menuItems.forEach(item => {
            item.addEventListener('mouseover', function() {
                const category = this.getAttribute('data-category');
                displaySubmenu(category);
            });
        });

        // Fonction pour afficher le sous-menu avec les sous-catégories
        function displaySubmenu(category) {
            submenu.innerHTML = ''; // Vider le contenu précédent
            const subcategories = categories[category];
            
            if (subcategories) {
                subcategories.forEach(sub => {
                    const div = document.createElement('div');
                    div.className = 'category-item';
                    div.innerHTML = `
                        <img src="${sub.image}" alt="${sub.name}" class="category-image">
                        <span>${sub.name}</span>
                    `;
                    submenu.appendChild(div);

                    // Ajout d'un gestionnaire de clic pour chaque sous-catégorie
                    div.addEventListener('click', function() {
                        alert(`Naviguer vers la page de ${sub.name}`);
                        // Ici, vous pouvez rediriger vers la page spécifique de la sous-catégorie
                        // window.location.href = `/category/${sub.name}`;
                    });
                });

                submenu.classList.add('active'); // Afficher le sous-menu
            } else {
                submenu.classList.remove('active'); // Cacher le sous-menu si aucune sous-catégorie n'est trouvée
            }
        }

        // Masquer le sous-menu lorsque le curseur quitte le menu principal
        document.querySelector('.menu-container').addEventListener('mouseleave', function() {
            submenu.classList.remove('active');
        });
    </script>
</body>
</html>
