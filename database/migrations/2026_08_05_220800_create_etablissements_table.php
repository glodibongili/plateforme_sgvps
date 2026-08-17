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
        Schema::create('etablissements', function (Blueprint $table) {

            // Clé primaire
            $table->id();

            // Informations de l'établissement
            $table->string('code_etablissement', 50)->unique();
            $table->string('nom_etablissement', 255);

            // Type d'établissement
            $table->enum('type_etablissement', [
                'Maternelle',
                'Primaire',
                'Secondaire',
                'Technique',
                'Professionnel'
            ]);

            // Coordonnées
            $table->string('adresse');
            $table->string('telephone', 20)->nullable();
            $table->string('email')->nullable();

            // Statut
            $table->enum('statut', ['Actif', 'Inactif'])->default('Actif');

            // Province (clé étrangère)
            $table->foreignId('province_id')
                  ->constrained('provinces')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            // Dates
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('etablissements');
    }
};
