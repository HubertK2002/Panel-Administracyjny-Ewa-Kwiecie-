<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kindergartens', function (Blueprint $table): void {
            $table->string('town', 120)->nullable();
            $table->string('street', 180)->nullable();
            $table->string('street_number', 20)->nullable();
            $table->string('postal_code', 6)->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('kindergartens', function (Blueprint $table): void {
            $table->dropColumn(['town', 'street', 'street_number', 'postal_code']);
        });
    }
};
