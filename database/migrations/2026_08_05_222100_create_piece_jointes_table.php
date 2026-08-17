<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute le migration.
     */
    public function up(): void
    {
        Schema::create('piece_jointes', function (Blueprint $table) {

        // Clé primaire
            $table->id();

        // Eleve concerné par la pièce jointe
            $table->foreignId('eleve_id')
            ->constrained('eleves')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Type de pièce jointe
            $table->enum('type_piece', ['Photo', 'Acte de naissance', 'Attestation', 'Autre']);

        // Nom du fichier de la pièce jointe
            $table->string('nom_fichier');

        // Chemin du fichier de la pièce jointe
            $table->string('chemin_fichier');

        // Taille du fichier de la pièce jointe
            $table->integer('taille_fichier')->nullable();

        // format du fichier de la pièce jointe
            $table->string('extension', 10)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('piece_jointes');
    }
};
