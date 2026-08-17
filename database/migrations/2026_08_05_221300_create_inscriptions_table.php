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
        Schema::create('inscriptions', function (Blueprint $table) {

            $table->id();

            // Clés étrangères
            $table->foreignId('eleve_id')->constrained('eleves')->cascadeOnDelete();

            $table->foreignId('etablissement_id')->constrained('etablissements')->cascadeOnDelete();

            $table->foreignId('classe_id')->constrained('classes')->cascadeOnDelete();

            $table->foreignId('annee_scolaire_id')->constrained('annees_scolaires')->cascadeOnDelete();

            // Numéro d'inscription
            $table->string('numero_inscription')->unique();

            // Date d'inscription
            $table->date('date_inscription');

            // Statut
            $table->enum('statut', [
                'En cours',
                'Validée',
                'Annulée'
            ])->default('En cours');

            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
