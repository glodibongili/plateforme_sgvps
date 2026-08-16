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
        Schema::create('alertes', function (Blueprint $table) {

        //cle primaire
            $table->id();

        //Eleve concerné
            $table->foreignId('eleve_id')
            ->constrained('eleves')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        //Etablissement ayant siggnalé l'alerte
            $table->foreignId('etablissement_id')
            ->constrained('etablissements')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Type d'alerte
            $table->enum('type_alerte', ['Bulletin falsifié', 'Resultat incoherent', 'Matricule invalide', 'Double inscription', 'Autre']);

        // Description de l'alerte
            $table->text('description');

        // Niveau de gravité de l'alerte
            $table->enum('niveau_gravite', ['Faible', 'Moyen', 'Elevé', 'Critique'])->default('Moyen');

        // Statut de l'alerte
            $table->enum('statut', ['En attente','En cours', 'Résolue', 'Ignorée'])->default('En attente');

            $table->timestamps();
        });

    }

    /**
     * Annule le migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertes');
    }
};
