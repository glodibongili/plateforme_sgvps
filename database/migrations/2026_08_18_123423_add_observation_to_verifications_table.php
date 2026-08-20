<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ajoute la colonne observation.
     */
    public function up(): void
    {
        Schema::table('verifications', function (Blueprint $table) {
            $table->text('observation')->nullable()->after('resultat');
        });
    }

    /**
     * Supprime la colonne observation en cas de rollback.
     */
    public function down(): void
    {
        Schema::table('verifications', function (Blueprint $table) {
            $table->dropColumn('observation');
        });
    }
};
