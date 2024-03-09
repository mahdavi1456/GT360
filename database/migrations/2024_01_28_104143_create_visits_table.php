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
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->string('url');
            $table->string('route')->nullable();
            $table->string('browser');
            $table->string('device');
            $table->string('target')->nullable();
            $table->string('object_type')->nullable();
            $table->string('slug')->nullable();
            $table->integer('component_id')->nullable();
            $table->integer('object_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
