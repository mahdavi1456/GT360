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
        Schema::create('component_theme', function (Blueprint $table) {
            $table->foreignId('component_id');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
            $table->foreignId('theme_id');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
           $table->primary(['component_id','theme_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_theme');
    }
};
