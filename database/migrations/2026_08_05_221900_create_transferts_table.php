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
        Schema::create('transferts', function (Blueprint $table) {

        // Clé primaire
            $table->id();

        // Eleve concerne par le transfert
            $table->foreignId('eleve_id')
            ->constrained('eleves')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Etablissement d'origine
            $table->foreignId('etablissement_origine_id')
            ->constrained('etablissements')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Etablissement de destination
            $table->foreignId('etablissement_destination_id')
            ->constrained('etablissements')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Date de transfert
            $table->date('date_transfert');

        // Motif du transfert
            $table->text('motif')->nullable();

        // Statut du transfert
            $table->enum('statut', ['En attente', 'Approuvé', 'Refusé'])->default('En attente');

            $table->timestamps();
        });
    }

    /**
     * Annule le migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferts');
    }
};
