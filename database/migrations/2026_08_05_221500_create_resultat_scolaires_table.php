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
        Schema::create('resultats_scolaires', function (Blueprint $table) {

            $table->id();

            // Inscription concernée
            $table->foreignId('inscription_id')
                  ->constrained('inscriptions')
                  ->cascadeOnDelete();

            // Résultats
            $table->decimal('moyenne_generale', 5, 2);

            $table->integer('rang')->nullable();

            $table->enum('decision', [
                'Admis',
                'Ajourné',
                'Exclu'
            ]);

            $table->text('observation')->nullable();

            $table->timestamps();

            // Une seule décision finale par inscription
            $table->unique('inscription_id');
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultats_scolaires');
    }
};
