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
        Schema::create('users', function (Blueprint $table) {

        // clé primaire
            $table->id();

        // informations personnelles de l'utilisateur
            $table->string('nom', 100);
            $table->string('postnom', 100);
            $table->string('prenom', 100);

            $table->enum('sexe', ['Masculin', 'Féminin']);

            $table->string('email')->unique();

            $table->timestamp('email_verified_at')->nullable();

        // photo de profil de l'utilisateur
            $table->string('photo_profil')->nullable();

        // Authentification de l'utilisateur
            $table->string('password');

        // Statut de l'utilisateur
            $table->boolean('actif')->default(true);

        //token de connexion laravel
            $table->rememberToken();

        // clés étrangères
            $table->foreignId('role_id')
            ->constrained('roles')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->foreignId('compte_id')
            ->constrained('comptes')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

           $table->foreignId('province_id')
            ->constrained('provinces')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
