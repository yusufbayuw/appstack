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
        Schema::create('m005_filament_resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laravel_migration_id')->nullable()->constrained('m004_laravel_migrations')->cascadeOnDelete();
            $table->json('fields')->nullable();
            $table->json('columns')->nullable();
            $table->text('command')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m005_filament_resources');
    }
};
