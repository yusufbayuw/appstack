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
        Schema::create('m004_laravel_migrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laravel_model_id')->nullable()->constrained('m003_laravel_models')->cascadeOnDelete();
            $table->json('fields')->nullable();
            $table->text('command')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m004_laravel_migrations');
    }
};
