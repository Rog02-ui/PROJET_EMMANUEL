<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crée la table 'categories'
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // ID de la catégorie
            $table->string('name'); // Nom de la catégorie
            $table->string('description')->nullable(); // Description optionnelle
            $table->timestamps(); // Timestamps (created_at et updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Supprime la table 'categories' si elle existe
        Schema::dropIfExists('categories');
    }
};
