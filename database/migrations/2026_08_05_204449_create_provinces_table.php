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
        Schema::create('provinces', function (Blueprint $table) {
            // Clé primaire
            $table->id();

            // Nom de la province
            $table->string('nom_province', 100)->unique();

            //chef lieu de la province
            $table->string('chef_lieu', 100);

            //Statut de la province
            $table->boolean('actif')->default(true);

            // Date de création et de mise à jour
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provinces');
    }
};
