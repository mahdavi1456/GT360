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
        Schema::create('nav_theme', function (Blueprint $table) {
            $table->foreignId('nav_id');
            $table->foreign('nav_id')->references('id')->on('navs')->onDelete('cascade');
            $table->foreignId('theme_id');
            $table->foreign('theme_id')->references('id')->on('themes')->onDelete('cascade');
           $table->primary(['nav_id','theme_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_theme');
    }
};
