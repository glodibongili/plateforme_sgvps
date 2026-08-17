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
        Schema::create('journal_activites', function (Blueprint $table) {

        // Clé primaire
            $table->id();

        // utilisateur  ayant effectué l'action
            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Action effectuée
            $table->string('action');

        // Description de l'action
            $table->text('description')->nullable();

        // Adresse IP de l'utilisateur
            $table->string('adresse_ip', 45)->nullable();

        // Navigateur utilisé par l'utilisateur
            $table->string('user_agent')->nullable();

        // Date et heure de l'action
            $table->timestamp('date_action');

            $table->timestamps();
        });
    }

    /**
     * Annule le migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('journal_activites');
    }
};
