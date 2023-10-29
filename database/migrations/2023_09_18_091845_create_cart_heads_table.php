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
        Schema::create('cart_heads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->string('user_name')->nullable();
            $table->string('user_family')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('user_mobile')->nullable();
            $table->string('customer_ip')->nullable();
            $table->string('total_price');
            $table->unsignedBigInteger('discount_id')->nullable();
            $table->string('discount_title')->nullable();
            $table->text('discount_description')->nullable();
            $table->string('discount_type')->nullable();
            $table->string('discount_value')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('final_price')->nullable();
            $table->string('cart_status');
            $table->string('token');
            $table->string('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_heads');
    }
};
