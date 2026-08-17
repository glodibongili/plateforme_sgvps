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
        Schema::create('annees_scolaires', function (Blueprint $table) {

            // Clé primaire
            $table->id();

            // Exemple : 2025-2026
            $table->string('libelle', 20)->unique();

            // Dates de l'année scolaire
            $table->date('date_debut');
            $table->date('date_fin');

            // Année en cours ?
            $table->boolean('en_cours')->default(false);

            // Statut
            $table->boolean('actif')->default(true);

            // Dates automatiques
            $table->timestamps();
        });
    }
    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('annees_scolaires');
    }
};
