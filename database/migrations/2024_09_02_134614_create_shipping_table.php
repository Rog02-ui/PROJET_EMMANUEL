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
        Schema::create('shipping', function (Blueprint $table) {
            $table->id(); // Identifiant unique du shipping
            $table->unsignedBigInteger('order_id'); // Clé étrangère qui référence l'identifiant de la commande
            $table->string('shipping_address'); // Adresse de livraison
            $table->string('shipping_status')->default('pending'); // Statut de la livraison, par défaut "pending"
            $table->timestamps(); // Champs created_at et updated_at

            // Clé étrangère
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping');
    }
};
