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
        Schema::create('component_taxonomy', function (Blueprint $table) {
            $table->foreignId('component_id');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade');
            $table->foreignId('taxonomy_id');
            $table->foreign('taxonomy_id')->references('id')->on('taxonomies')->onDelete('cascade');
            $table->primary(['component_id','taxonomy_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('component_taxonomy');
    }
};
