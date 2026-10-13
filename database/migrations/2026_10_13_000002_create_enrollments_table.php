<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('enrollments', function (Blueprint $table): void {
            $table->id();
            $table->string('child_name', 180);
            $table->unsignedTinyInteger('child_age');
            $table->string('parent_name', 180);
            $table->string('email', 180);
            $table->string('phone', 40);
            $table->string('classes', 180);
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
