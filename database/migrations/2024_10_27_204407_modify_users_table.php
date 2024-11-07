<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name'); // Supprimer la colonne 'name'
            $table->string('first_name')->after('id'); // Ajouter la colonne 'first_name'
            $table->string('last_name')->after('first_name'); // Ajouter la colonne 'last_name'
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->after('id'); // Réajouter la colonne 'name' en cas de rollback
            $table->dropColumn(['first_name', 'last_name']); // Supprimer les colonnes 'first_name' et 'last_name'
        });
    }
};
