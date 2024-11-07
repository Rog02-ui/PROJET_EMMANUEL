<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Catégories existantes
        Category::create([
            'name' => 'Électronique',
            'description' => 'Appareils électroniques et gadgets'
        ]);

        Category::create([
            'name' => 'Mode',
            'description' => 'Vêtements et accessoires'
        ]);

        // Ajout des nouvelles catégories
        Category::create([
            'name' => 'Santé et Beauté',
            'description' => 'Produits de soin et beauté'
        ]);

        Category::create([
            'name' => 'Informatique',
            'description' => 'Ordinateurs et accessoires informatiques'
        ]);

        Category::create([
            'name' => 'Maisons et Bureau',
            'description' => 'Meubles, décoration, et fournitures de bureau'
        ]);

        Category::create([
            'name' => 'Produits pour bébé',
            'description' => 'Articles pour bébés et jeunes enfants'
        ]);

        Category::create([
            'name' => 'Articles de sport',
            'description' => 'Matériel et équipement sportif'
        ]);

        Category::create([
            'name' => 'Jeux vidéo et consoles',
            'description' => 'Consoles de jeux et accessoires'
        ]);

        Category::create([
            'name' => 'Automobile',
            'description' => 'Accessoires et équipements pour voitures'
        ]);

        Category::create([
            'name' => 'Épicerie et Boissons',
            'description' => 'Produits alimentaires et boissons'
        ]);
    }
}
