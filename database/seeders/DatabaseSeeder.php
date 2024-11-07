<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\user;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create();
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            // Ajoutez d'autres seeders ici si nécessaire
        ]);
    }
}
