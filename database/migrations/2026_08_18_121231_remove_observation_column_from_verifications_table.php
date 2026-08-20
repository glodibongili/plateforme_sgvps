<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Supprime l'ancienne colonne Observation.
     */
    public function up(): void
    {
        Schema::table('verifications', function (Blueprint $table) {
            $table->dropColumn('Observation');
        });
    }

    /**
     * Restaure la colonne Observation en cas de rollback.
     */
    public function down(): void
    {
        Schema::table('verifications', function (Blueprint $table) {
            $table->text('Observation')->nullable();
        });
    }
};
