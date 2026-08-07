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
        Schema::create('notes', function (Blueprint $table) {

            $table->id();

            // Clés étrangères
            $table->foreignId('inscription_id')
                  ->constrained('inscriptions')
                  ->cascadeOnDelete();

            $table->foreignId('matiere_id')
                  ->constrained('matieres')
                  ->cascadeOnDelete();

            // Notes
            $table->decimal('note_obtenue', 5, 2);

            $table->decimal('note_maximale', 5, 2)->default(20);

            // Période
            $table->enum('periode', [
                '1er Trimestre',
                '2ème Trimestre',
                '3ème Trimestre'
            ]);

            // Observation
            $table->text('observation')->nullable();

            $table->timestamps();

            // Une seule note par matière et par période
            $table->unique([
                'inscription_id',
                'matiere_id',
                'periode'
            ]);
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
