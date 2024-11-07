<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - {{ config('app.name') }}</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
        .header {
            margin: 0;
            padding: 0;
        }

        .search-bar {
            margin-top: 0; 
            padding-top: 0;
        }
        /* Styles de base */
        .body {
            font-family: "inter";
            margin: 0;
            padding: 0;
            text-align: left; /* S'assurer que le texte est aligné à gauche */

        }

        /* Menu principal */
        .menu-container .main-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100%;
            background-color: #333;
            color: #fff;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            z-index: 900;
        }

        .menu-container .main-menu.active {
            transform: translateX(0);
        }

        .menu-container .main-menu ul {
            list-style: none;
            padding: 20px;
            margin: 0;
        }

        .menu-container .main-menu ul li {
            padding: 15px;
            cursor: pointer;
            border-bottom: 1px solid #444;
        }

        .menu-container .main-menu ul li:hover {
            background-color: #444;
        }

        /* Sous-menu */
        .menu-container .submenu {
    background-color: #f7f7f7;
    padding: 15px;
    width: 300px;
    position: absolute;
    left: 250px;
    top: 0;
    height: 100vh;
    overflow-y: auto;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
    z-index: 999;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}
    /* Styles pour les éléments du sous-menu */
.menu-container .submenu .category-item {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    cursor: pointer;
}

/* Styles pour les images des sous-menus */
.menu-container .submenu .category-item .category-image {
    width: 50px; /* Taille de l'image */
    height: 50px; /* Taille de l'image */
    border-radius: 50%; /* Rend l'image ronde */
    object-fit: cover; /* Ajuste l'image à l'intérieur du conteneur */
    margin-right: 10px; /* Espace entre l'image et le texte */
    border: 2px solid #ddd; /* Optionnel : ajoute une bordure autour de l'image */
}


.menu-container .submenu.active {
    opacity: 1;
    visibility: visible;
}

        /* Menu overlay (for closing the menu when clicking outside) */
        .menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 800;
        }

        .menu-overlay.active {
            display: block;
        }
        .bande-colorée {
    background-color: #add8e6; /* Couleur de fond */
    color: #000; /* Couleur du texte */
    text-align: center; /* Centrer le texte */
    padding: 7px 0; /* Espace autour du texte */
    font-size: 20px; /* Taille du texte */
    font-weight: bold; /* Rendre le texte plus visible */
    width: 100%; /* Assurer que ça couvre toute la largeur */
    margin-bottom: 30px; /* Espace en bas de la bande */
}
/* Centrer les produits dans le conteneur et occuper toute la largeur */
.container {
    display: flex;
    flex-wrap: wrap; /* Permet aux produits de se déplacer à la ligne si l'espace est insuffisant */
    justify-content: center; /* Centre les produits horizontalement */
    padding: 0 15px; /* Un peu de padding pour ne pas coller aux bords */
    width: 120%; /* Assurer que ça couvre toute la largeur */
    margin-right: auto;

}

.product-card {
    width: calc(25% - 30px); /* Ajuster en fonction du nombre de colonnes souhaité (4 colonnes ici) */
    margin: 15px;
    box-sizing: border-box; /* Pour que padding et border soient inclus dans la largeur */
    text-align: center; /* Centre le texte et les éléments dans chaque carte produit */
    position: relative; /* Pour positionner l'icône du cœur par rapport à ce conteneur */

}
.add-to-favorites {
    position: relative;
    top: -10px; /* Ajuste la position verticale de l'icône du cœur */
    right: 10px; /* Ajuste la position horizontale de l'icône du cœur */
    font-size: 20px; /* Taille de l'icône */
    cursor: pointer; /* Ajoute un curseur pointer pour rendre l'icône cliquable */
    z-index: 2; /* Place l'icône au-dessus des autres éléments */
}

.heart-icon {
    color: red; /* Couleur par défaut de l'icône */
    font-size: 24px; /* Taille de l'icône */
    cursor: pointer; /* Change le curseur au survol */
    transition: color 0.3s ease; /* Transition douce pour le changement de couleur */
    display: inline-block;

}

.heart-icon.active {
    color: red; /* Couleur de l'icône lorsqu'elle est active */
}
.service-image {
    width: 100%;
    height: 200px; /* Ajuster la hauteur ici */
    background-size: contain; /* Adapter l'image à l'intérieur du conteneur */
    background-repeat: no-repeat; /* Ne pas répéter l'image */
    background-position: center; /* Centrer l'image dans le conteneur */
    border-radius: 8px; /* Arrondir les bords si nécessaire */
    background-color: #f8f9fa; /* Fond par défaut pour éviter un espace vide */
}
 /* Style pour assurer que le footer occupe toute la largeur */
 body, html {
            margin: 0;
            padding: 0;
            height: 100%; /* Pour s'assurer que le footer est toujours en bas */
        }
        .content {
            min-height: 100vh; /* Pour forcer le contenu à occuper tout l'écran */
            padding-bottom: 80px; /* Laisser de la place pour le footer */
        }
        footer {
            width: 100vw; /* S'assurer que le footer occupe toute la largeur de la vue */
            position: fixed; /* Fixer le footer en bas */
            bottom: 0;
            left: 0;
            background-color: #343a40; /* Couleur de fond du footer */
            color: white; /* Couleur du texte */
            padding: 10px 0; /* Espacement interne */
        }
        /* Styles de la barre de navigation */
        .navbar {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
        }
        .user-menu, .favorites, .help {
            position: relative;
        }
        .user-menu i, .favorites i, .help i {
            font-size: 24px;
            cursor: pointer;
            color: #333;
        }
        /* Menu déroulant pour l'utilisateur */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 35px;
            right: 0;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 5px;
            z-index: 1000;
        }
        .dropdown-menu a {
            display: block;
            padding: 8px;
            color: #333;
            text-decoration: none;
        }
        .dropdown-menu a:hover {
            background-color: #f0f0f0;
        }
        /* Afficher le menu déroulant au survol ou clic */
        .user-menu:hover .dropdown-menu, 
        .user-menu:focus-within .dropdown-menu,
        .user-menu:focus-within .dropdown-menu:hover {
            display: block;
        }
        /* Styles pour le cœur sous chaque produit */
        .add-to-favorites {
            font-size: 20px;
            color: #ccc;
            cursor: pointer;
            transition: color 0.3s; /* Transition douce pour le changement de couleur */
        }
        .add-to-favorites.clicked {
            color: red; /* Changer la couleur à rouge après avoir cliqué */
        }

       /* Style du menu burger */
       
    /* Placement du menu burger en haut à droite */
    /* Placement du menu burger */
/* CSS pour l'élément menu-burger */
#menu-burger {
    position: fixed; /* ou absolute, selon la structure */
    left: 0; /* alignement à l'extrême gauche */
    top: 0; /* pour qu'il soit en haut de la page */
    z-index: 1000; /* Assurez-vous que ce z-index soit supérieur aux autres éléments de la page */
    width: 250px; /* ajustez la largeur en fonction de vos préférences */
    height: 100vh; /* pour couvrir toute la hauteur de l'écran */
    background-color: #fff; /* ou toute autre couleur pour se détacher du fond */
    transition: transform 0.3s ease; /* pour une animation de glissement */
    transform: translateX(-100%); /* Par défaut, caché à gauche */
}

/* Classe pour afficher le menu-burger */
.menu-burger-active {
    transform: translateX(0); /* fait glisser le menu dans la vue */
}


/* Ajustement du menu principal pour les transitions */
.main-menu {
    position: fixed;
    top: 50px;
    left: 0;
    width: 250px;
    height: 100%;
    background: white;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transform: translateX(-100%);
    transition: transform 0.3s ease;
    z-index: 20;
}

.main-menu.active {
    transform: translateX(0);
}


/* Styles de la barre de recherche */
.find {
    display: flex;
    align-items: center;
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 0 10px;
    background-color: #fff;
}

.find .ic {
    margin-right: 8px;
    fill: #666;
}

.find input[type="search"] {
    flex: 1;
    border: none;
    outline: none;
}

/* Conteneur de suggestions */
.sug {
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #ccc;
    background-color: #fff;
    z-index: 10;
    display: none;
}

.sug div {
    padding: 8px;
    cursor: pointer;
}
.sug div:hover {
    background-color: #f0f0f0;
}


    
 </style>
</head>

<body>

  <!-- Barre de navigation -->
  <nav class="navbar">
        <div class="user-menu">
            <i class="fas fa-user" id="userIcon"></i>
            <!-- Menu déroulant -->
            <div class="dropdown-menu" id="userDropdown">
                <a href="{{ route('login') }}">Se connecter</a>
                <a href="{{ route('register') }}">S'inscrire</a>
                <a href="{{ route('user.orders') }}">Mes commandes</a>
                <a href="{{ route('user.points') }}">Points</a>
            </div>
        </div>

        <!-- Icône "Panier" avec le chariot -->
        <div class="cart-container">
            <a href="{{ route('cart.index') }}" class="btn cart-btn">
                <i class="fas fa-shopping-cart"></i>
                <span>Panier</span>
            </a>
        </div>

        <!-- Icône d'aide avec le point d'interrogation -->
        <div class="help">
            <i class="fas fa-question-circle" id="helpIcon"></i>
            <a href="{{ route('help') }}">Aide</a>
        </div>
    </nav>

    <!-- Contenu Principal -->
    <!--<div class="content">-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @yield('content') <!-- Section dynamique pour le contenu -->
                </div>
            </div>
        </div>
   <!-- </div>-->

        <!-- Menu burger1 -->
    <div class="col-md-1">
        <div class="menu-container">
            <!-- Menu principal -->
            <nav>
                <div class="main-menu" id="mainMenu">
                    <ul>
                    <li data-category="electronics">Électronique</li>
                    <li data-category="fashion">Mode</li>
                    <li data-category="electromenager">Électroménager</li>
                    <li data-category="bebe">Produits pour bébés</li>
                    <li data-category="jouets">Jouets et Jeux</li>
                    <li data-category="home">Maison et Bureau</li>
                    <li data-category="books">Livres</li>
                    <li data-category="sports">Articles de sport</li>
                    </ul>
                </div>
            </nav>

            <!-- Sous-menu dynamique -->
                <div class="submenu" id="submenu">

                </div>
        </div>
    </div>


    <!-- Barre de recherche dans la vue -->
<form 
    action="{{ route('products.search') }}" 
    method="GET" 
    class="d-flex" 
    style="max-width: 600px; height: 40px; margin: auto;"
    data-track-onsubmit="search" 
    data-track-onsubmit-bound="true">
    
    <div class="find" style="display: flex; align-items: center; width: 100%;">
        <!-- Icône de recherche avec xlink:href pour une image externe -->
        <svg viewBox="0 0 24 24" class="ic" width="24" height="24">
            <use xlink:href="{{ asset('path/to/your-icons.svg#search') }}"></use>
        </svg>

        <!-- Champ de recherche -->
        <input 
            class="form-control me-2" 
            type="search" 
            name="query" 
            placeholder="Rechercher un produit, une marque ou une catégorie" 
            aria-label="Rechercher" 
            required 
            style="height: 100%;"
            autocomplete="off">
        
        <!-- Bouton de réinitialisation -->
        <button type="button" class="rst" aria-label="Réinitialiser" style="border: none; background: transparent;">
            <svg viewBox="0 0 24 24" class="ic" width="24" height="24">
                <use xlink:href="{{ asset('path/to/your-icons.svg#close') }}"></use>
            </svg>
        </button>

        <!-- Suggestions dynamiques -->
        <div class="sug"></div>
    </div>

    <!-- Bouton de recherche -->
    <button class="btn btn-dark" type="submit" style="height: 100%; display: flex; align-items: center; padding: 0 15px;">
        <i class="fas fa-search me-2"></i> Rechercher
    </button>
</form>


    <!-- Menu burger -->
    
        <div class="menu-burger" id="menuBurger" onclick= "toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
    
    <!-- Overlay pour fermer le menu -->
    <div class="menu-overlay" id="menuOverlay"></div>

    <!-- Menu de catégories dynamique -->
    <div class="container">
        <div class="row">
            

            <div class="col-md-10">
                <!-- Contenu principal avec promotions et produits populaires -->
                @yield('promotions')
                @yield('products')
                @yield('services')
            </div>
        </div>
    </div>
<br><br><br>
    <footer class="text-white text-center py-3 bg-dark">
        2024 - EBB
    </footer>
</body>
</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Gestion du menu burger et de l'overlay
        const menuBurger = document.getElementById('menu-burger');
        const mainMenu = document.getElementById('mainMenu');
        const menuOverlay = document.getElementById('menuOverlay');
        const submenu = document.getElementById('submenu');
        const burgerIcon = document.getElementById('burger-icon');

        // Gestion du clic pour afficher/masquer le menu burger
        burgerIcon.addEventListener('click', () => {
            menuBurger.classList.toggle('menu-burger-active'); // Ajoute/Retire la classe active
            mainMenu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
        });

        // Fermeture du menu en cliquant sur l'overlay
        menuOverlay.addEventListener('click', function() {
            mainMenu.classList.remove('active');
            menuOverlay.classList.remove('active');
        });

        // Données des images associées aux catégories
        const images = {
            electronics: [
                { src: '/images/electronics/tv.jpg', title: 'Télévision' },
                { src: '/images/electronics/ordinateur-portable-hp.jpeg', title: 'Ordinateurs' },
                { src: '/images/electronics/phone.jpg', title: 'Téléphones' }
            ],
            // ... Autres catégories
        };

        // Gestion du sous-menu au survol des catégories
        const menuItems = document.querySelectorAll('.main-menu ul li');
        menuItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                const category = item.dataset.category;
                if (images[category]) {
                    submenu.classList.add('active');
                    submenu.innerHTML = images[category].map(img =>
                        `<div class="category-item">
                            <a href="/categories/${category}/${img.title}">
                                <img src="${img.src}" alt="${img.title}" class="category-image">
                                <span>${img.title}</span>
                            </a>
                        </div>`
                    ).join('');
                }
            });
        });

        // Cacher le sous-menu lors du survol hors du menu principal
        mainMenu.addEventListener('mouseleave', function() {
            submenu.classList.remove('active');
        });

        // Gestion de l'icône "favoris"
        document.querySelectorAll('.heart-icon').forEach(function(icon) {
            icon.addEventListener('click', function() {
                const productId = this.dataset.productId;
                const isActive = this.classList.contains('active');
                const url = isActive ? `/favorites/remove/${productId}` : `/favorites/add/${productId}`;
                
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        this.classList.toggle('active');
                    }
                })
                .catch(error => console.error('Erreur:', error));
            });
        });

        // Gestion de la barre de recherche
        const searchInput = document.querySelector('.find input[type="search"]');
        const resetButton = document.querySelector('.find .rst');
        const suggestionsContainer = document.querySelector('.sug');

        // Affichage du bouton de réinitialisation si du texte est présent
        searchInput.addEventListener('input', function() {
            resetButton.style.display = searchInput.value ? 'inline' : 'none';
            fetchSuggestions(searchInput.value);
        });

        // Réinitialisation du champ de recherche
        resetButton.addEventListener('click', function() {
            searchInput.value = '';
            resetButton.style.display = 'none';
            suggestionsContainer.style.display = 'none';
        });

        // Fonction pour récupérer les suggestions
        function fetchSuggestions(query) {
            if (!query) {
                suggestionsContainer.style.display = 'none';
                return;
            }

            fetch(`/api/search-suggestions?query=${query}`)
                .then(response => response.json())
                .then(data => {
                    suggestionsContainer.innerHTML = '';
                    data.suggestions.forEach(suggestion => {
                        const suggestionElement = document.createElement('div');
                        suggestionElement.textContent = suggestion;
                        suggestionElement.addEventListener('click', () => {
                            searchInput.value = suggestion;
                            suggestionsContainer.style.display = 'none';
                        });
                        suggestionsContainer.appendChild(suggestionElement);
                    });
                    suggestionsContainer.style.display = 'block';
                })
                .catch(error => console.error('Erreur lors de la récupération des suggestions:', error));
        }
    });
</script>
