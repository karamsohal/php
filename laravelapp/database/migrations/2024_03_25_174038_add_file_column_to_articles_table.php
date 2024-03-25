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
        Schema::table('articles', function (Blueprint $table) {
            Schema::table('articles', function (Blueprint $table) {
                // Add a 'file' column to store the image path
                $table->string('file')->nullable(); // Making it nullable in case some articles don't have an image
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Drop the 'file' column if the migration is rolled back
            $table->dropColumn('file');
        });
    }
};
