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
        Schema::create('sections', function (Blueprint $table) {
            // Clé primaire
            $table->id();

            // nom de la section
            $table->string('nom_section', 100)->unique();

            //Description de la section
            $table->text('description')->nullable();

            //Statut de la section
            $table->boolean('actif')->default('true');

            // Date de création et de mise à jour
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
