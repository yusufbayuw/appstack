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
        Schema::create('m003_laravel_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('laravel_stack_id')->nullable()->constrained('m002_laravel_stacks')->cascadeOnDelete();
            $table->string('model_name');
            $table->json('fields')->nullable();
            $table->json('relationships')->nullable();
            $table->text('command')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m003_laravel_models');
    }
};
