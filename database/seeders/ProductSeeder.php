<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
          // Supprimer tous les enregistrements de la table products
          Product::query()->delete();


        //insérer les nouveaux produits
        Product::create([
            'name' => 'Télévision 4K',
            'description' => 'Télévision ultra haute définition 4K pour une expérience immersive.',
            'price' => 150000,
            'image_url' => 'images/products/electronics/Télévision 4K.jpeg',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Jeans Denim',
            'description' => 'Jeans confortable en denim, parfait pour un style décontracté.',
            'price' => 5500,
            'image_url' => 'images/products/Fashion/Jeans Denim.jpeg',
            'is_popular' => true,
            'category_id' => 2,
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'Téléphone',
            'description' => 'Téléphone intelligent avec des fonctionnalités avancées.',
            'price' => 85000,
            'image_url' => 'images/products/electronics/phone.webp',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 20,
        ]);

        Product::create([
            'name' => 'Ordinateur',
            'description' => 'Ordinateur portable haute performance pour le travail et le divertissement.',
            'price' => 250000,
            'image_url' => 'images/products/electronics/ordinateur-portable-hp.jpeg',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 20,
        ]);

        Product::create([
            'name' => 'Machine à laver',
            'description' => 'Machine à laver de haute capacité pour un nettoyage efficace de vos vêtements.',
            'price' => 300000,
            'image_url' => 'images/products/Électroménager/machine_à_laver.jpeg',
            'is_popular' => true,
            'category_id' => 2,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Climatiseur',
            'description' => 'Climatiseur efficace pour rafraîchir votre maison pendant l\'été.',
            'price' => 200000,
            'image_url' => 'images/products/Électroménager/climatiseur.jpeg',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Pot de fleur',
            'description' => 'Pot de fleur décoratif pour embellir votre espace intérieur.',
            'price' => 3000,
            'image_url' => 'images/products/Home/Fleur.jpg',
            'is_popular' => true,
            'category_id' => 2,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Montre',
            'description' => 'Montre élégante et moderne pour tous les jours.',
            'price' => 6000,
            'image_url' => 'images/products/Fashion/montre.jpeg',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Pull',
            'description' => 'Pull chaud et confortable pour les saisons froides.',
            'price' => 5000,
            'image_url' => 'images/products/Fashion/pull.jpeg',
            'is_popular' => true,
            'category_id' => 2,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Chaussures',
            'description' => 'Chaussures de qualité pour toutes les occasions.',
            'price' => 12000,
            'image_url' => 'images/products/Fashion/chaussures.jpg',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Lampe',
            'description' => 'Lampe moderne pour éclairer et décorer votre intérieur.',
            'price' => 1000,
            'image_url' => 'images/products/Home/lampe.png',
            'is_popular' => true,
            'category_id' => 2,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Chaise',
            'description' => 'Chaise confortable et stylée pour votre bureau ou salon.',
            'price' => 13000,
            'image_url' => 'images/products/Home/chaise.jpeg',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Console de jeu',
            'description' => 'Console de jeu de dernière génération pour une expérience de jeu immersive.',
            'price' => 20000,
            'image_url' => 'images/products/Jouet et console/console.jpeg',
            'is_popular' => true,
            'category_id' => 2,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Trousseau pour bébé',
            'description' => 'Ensemble complet pour le soin de votre bébé.',
            'price' => 10000,
            'image_url' => 'images/products/Produits pour Bébés/Babymed Gamme Babymed.jpeg',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 50,
        ]);

        Product::create([
            'name' => 'Kit de sport',
            'description' => 'Kit de sport complet pour vos entraînements quotidiens.',
            'price' => 13000,
            'image_url' => 'images/products/Sports/kit_de_sport.jpg',
            'is_popular' => true,
            'category_id' => 1,
            'stock' => 50,
        ]);

        // Ajoutez d'autres produits si nécessaire
    }
}