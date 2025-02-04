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
        Schema::create('m001_vm_stacks', function (Blueprint $table) {
            $table->id();
            $table->string('stack_name');
            $table->json('apt_packages')->nullable();
            $table->text('bash_script')->nullable();
            $table->string('os')->nullable();
            $table->string('version')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m001_vm_stacks');
    }
};
