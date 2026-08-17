<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration.
     */
    public function up(): void
    {
        Schema::create('comptes', function (Blueprint $table) {
            // Clé primaire
            $table->id();

            //nom du compte
            $table->string('nom_compte', 100)->unique();

            //Description du compte
            $table->text('description')->nullable();

            //derniere date de connexion du compte
            $table->timestamp('derniere_connexion')->nullable();

            //Statut du compte
            $table->enum('statut', ['actif', 'inactif', 'suspendu'])->default('actif');

            // Date de création et de mise à jour
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
