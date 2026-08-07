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
        Schema::create('matieres', function (Blueprint $table) {
            // Clé primaire
            $table->id();

            // Code unique de la matière
            $table->string('code_matiere', 20)->unique();

            // Nom de la matière
            $table->string('nom_matiere', 100);

            // Coefficient de la matière
            $table->unsignedSmallInteger('coefficient')->default(1);

            // Statut de la matière
            $table->boolean('actif')->default(true);

            // Date de création et de mise à jour
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};
