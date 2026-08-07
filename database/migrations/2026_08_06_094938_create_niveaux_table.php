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
        Schema::create('niveauxes', function (Blueprint $table) {
            // Clé primaire
            $table->id();

            // nom du niveau
            $table->string('nom_niveau', 100)->unique();


            // Description du niveau
            $table->text('description')->nullable();


            // Statut du niveau
            $table->enum('statut', ['actif', 'inactif'])->default('actif');


            // Date de création et de mise à jour
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveaux');
    }
};
