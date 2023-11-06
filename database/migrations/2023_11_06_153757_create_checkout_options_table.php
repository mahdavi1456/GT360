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
        Schema::create('checkout_options', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('details');
            $table->double('off_price');
            $table->double('real_price');
            $table->tinyInteger('show_status');
            $table->double('min_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout_options');
    }
};
