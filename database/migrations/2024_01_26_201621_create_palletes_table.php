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
        Schema::create('palletes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('label');
            $table->text('details')->nullable();
            $table->string('first_color');
            $table->string('second_color')->nullable();
            $table->string('third_color')->nullable();
            $table->string('fourth_color')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('palletes');
    }
};
