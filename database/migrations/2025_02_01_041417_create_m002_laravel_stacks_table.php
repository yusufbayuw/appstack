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
        Schema::create('m002_laravel_stacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vm_stack_id')->nullable()->constrained('m001_vm_stacks')->cascadeOnDelete();
            $table->string('name');
            $table->string('laravel_version')->nullable();
            $table->json('composer_packages')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m002_laravel_stacks');
    }
};
