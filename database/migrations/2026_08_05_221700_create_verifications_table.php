<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
    *Exécute la migration.
     */
    public function up(): void
    {
        Schema::create('verifications', function (Blueprint $table) {

        // cle primaire
            $table->id();

        // Bulletin vérifié
            $table->foreignId('bulletin_id')
            ->constrained('bulletins')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

         // Utilisateur ayant  effectué la vérification

            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Date de vérification
            $table->datetime('date_verification');

        //Resultat de la vérification
            $table->enum('resultat', ['Authentique', 'Suspect', 'Falsifié']);

        // Motif ou commentaire
        $table->text('observation')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Annule le migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('verifications');
    }
};
