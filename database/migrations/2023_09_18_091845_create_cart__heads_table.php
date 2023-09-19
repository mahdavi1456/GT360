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
        Schema::create('cart__heads', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_family');
            $table->string('user_id');
            $table->string('user_mobile');
            $table->string('user_ip');
            $table->string('total_price');
            $table->string('cart_status');
            $table->string('details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart__heads');
    }
};
