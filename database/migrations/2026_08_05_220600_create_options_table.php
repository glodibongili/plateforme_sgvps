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
        Schema::create('options', function (Blueprint $table) {
            // clé primaire
            $table->id();

            // nom de l'option
            $table->string('nom_option', 100)->unique();

            // description de l'option
            $table->text('description')->nullable();

            // statut de l'option
            $table->enum('statut', ['actif', 'inactif'])->default('actif');

            // date de création et de mise à jour
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
