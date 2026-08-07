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
        Schema::create('eleves', function (Blueprint $table) {
            // Clé primaire
            $table->id();

            //Matricule de l'élève.
            $table->string('matricule', 14)->unique();

            // informations personnelles de l'élève.
            $table->string('photo')->nullable();
            $table->string('nom', 100);
            $table->string('postnom', 100);
            $table->string('prenom', 100);

            $table->enum('sexe', ['masculin', 'feminin']);

            $table->date('date_naissance');

            $table->string('lieu_naissance', 100);

            // information complémentaire de l'élève.
            $table->string('nom_pere', 100)->nullable();
            $table->string('nom_mere', 100)->nullable();

            $table->string('telephone_parent', 20)->nullable();

            $table->string('adresse')->nullable();

            // Statut de l'élève.
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
        Schema::dropIfExists('eleves');
    }
};
