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
        Schema::create('classes', function (Blueprint $table) {

            // Clé primaire
            $table->id();

            // Nom de la classe
            $table->string('nom_classe', 100);

            // Nombre maximal d'élèves
            $table->unsignedSmallInteger('capacite')->default(200);

            // Statut
            $table->boolean('actif')->default(true);

            // Clé étrangère vers l'établissement
            $table->foreignId('etablissement_id')
                  ->constrained('etablissements')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            // Clé étrangère vers l'année scolaire
            $table->foreignId('annee_scolaire_id')
                  ->constrained('annees_scolaires')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            // Clé étrangère vers le niveau
            $table->foreignId('niveau_id')
                  ->constrained('niveaux')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            // Clé étrangère vers la section (facultative)
            $table->foreignId('section_id')
                  ->nullable()
                  ->constrained('sections')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

            // Clé étrangère vers l'option (facultative)
            $table->foreignId('option_id')
                  ->nullable()
                  ->constrained('options')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
