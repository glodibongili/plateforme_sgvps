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
        Schema::create('bulletins', function (Blueprint $table) {

        // clé primaire
            $table->id();

        // Résultat scolaire concerné
            $table->foreignId('resultat_scolaire_id')
            ->constrained('resultats_scolaires')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Numéro unique du bulletin
           $table->string('numero_bulletin')->unique();

        //QR Code (chemin de fichier)
            $table->string('qr_code')->nullable();

        // PDF du fichier (chemin du fichier)
            $table->string('fichier_pdf')->nullable();

        // Date d'émission
            $table->date('date_emission')->nullable();

        // statut du bulletin
            $table->enum('statut', ['Brouillon', 'Publier', 'Annulé'])->default('Brouillon');


            $table->timestamps();
        });
    }

    /**
     * Annule le migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('bulletins');
    }
};
