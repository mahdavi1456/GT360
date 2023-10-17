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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('details')->nullable();
            $table->string('price');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_fullname');
            $table->string('customer_mobile');
            $table->unsignedBigInteger('customer_address_id');
            $table->string('customer_state');
            $table->string('customer_city');
            $table->string('customer_address');
            $table->string('customer_zipcode');
            $table->unsignedBigInteger('transport_id');
            $table->string('transport_title');
            $table->string('transport_price');
            $table->text('transport_details');
            $table->unsignedBigInteger('payment_type_id');
            $table->string('payment_type_title');
            $table->text('payment_type_details');
            $table->foreign('cart_id')->references('id')->on('cart_heads');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('customer_address_id')->references('id')->on('customer_addresses');
            $table->foreign('transport_id')->references('id')->on('transports');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
