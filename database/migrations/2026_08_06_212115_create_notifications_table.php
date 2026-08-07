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
        Schema::create('notifications', function (Blueprint $table) {

        // Clé primaire
            $table->id();

        // utilisateur concerné par la notification
            $table->foreignId('user_id')
            ->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();

        // Titre de la notification
            $table->string('titre');

        // Message de la notification
            $table->text('message');

        // Type de notification
            $table->enum('type', ['info', 'alerte', 'success', 'erreur']);

        // etat de lecture de la notification
            $table->boolean('lu')->default(false);

        // Date de lecture de la notification
            $table->datetime('date_lecture')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Annule le migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
