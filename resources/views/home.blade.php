{{-- home.blade.php --}}
@extends('welcome')

@section('content')
    <h2 class="text-center my-4">EBB</h2>
    <!-- Contenu supplémentaire ici -->
@endsection

@section('promotions')
    <section id="promotion" class="mb-5">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/promo1.jpg') }}" class="d-block w-100" alt="Promotion 1">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Offre Spéciale - Livraison Express</h5>
                        <p>Profitez de notre livraison express pour les produits locaux</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/promo2.jpg') }}" class="d-block w-100" alt="Promotion 2">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Produits Éco-Responsables</h5>
                        <p>Découvrez notre sélection de produits à faible empreinte carbone</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('products')
    <section id="popular-products" class="container">
        <div class="bande-colorée">
            <h2>Produits Populaires</h2>
        </div>
        <div class="row">
            @foreach($popularProducts as $product)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 d-flex flex-column justify-content-between">
                        <a href="{{ route('products.show', $product->id) }}">
                            <img src="{{ asset($product->image_url ?? 'images/default-product.jpg') }}" class="card-img-top" alt="{{ $product->name ?? 'Produit' }}" style="max-height: 200px; object-fit: cover;">
                        </a>
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="mb-3">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ number_format($product->price, 0, ',', ' ') }} FCFA</p>
                            </div>

                            <div class="favorites">
                                <a href="#" class="heart-link">❤️</a> <!-- Vous pouvez définir l'URL si nécessaire -->
                            </div>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                 @csrf
                                <button type="submit" class="btn btn-success w-100 mt-auto">
                                    <i class="fas fa-shopping-cart"></i> Ajouter au panier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('services')
    <section id="services" class="container">
        <div id="servicesCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="service-item text-center">
                        <div class="service-caption">
                            <h3>Qualité</h3>
                            <p>Nos produits sont soigneusement sélectionnés pour répondre à vos attentes.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="service-item text-center">
                        <div class="service-caption">
                            <h3>Soutien Local</h3>
                            <p>Encouragez l'artisanat local et soutenez les communautés rurales en achetant localement.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="service-item text-center">
                        <div class="service-image" style="background-image: url('{{ asset('images/products/service/livreur.jpg') }}');"></div>
                        <div class="service-caption">
                            <h3>Livraison</h3>
                            <p>Recevez vos articles en 24h dans tout Dakar.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#servicesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#servicesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section><script>
    document.addEventListener('DOMContentLoaded', function() {
        const heartIcon = document.getElementById('heartIcon');

        heartIcon.addEventListener('click', function() {
            // Ajouter la logique pour gérer le clic ici
            alert('Icône de cœur cliquée !');
            // Exemple : envoyer une requête AJAX pour ajouter aux favoris
        });
    });
</script>
@endsection


