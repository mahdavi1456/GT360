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
            $table->unsignedBigInteger('account_id');
            $table->string('price');
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('customer_fullname')->nullable();
            $table->string('customer_mobile')->nullable();
            $table->unsignedBigInteger('customer_address_id')->nullable();
            $table->string('customer_state')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_zipcode')->nullable();
            $table->unsignedBigInteger('transport_id')->nullable();
            $table->string('transport_title')->nullable();
            $table->string('transport_price')->nullable();
            $table->text('transport_details')->nullable();
            $table->unsignedBigInteger('payment_type_id')->nullable();
            $table->string('payment_type_title')->nullable();
            $table->text('payment_type_details')->nullable();
            $table->foreign('cart_id')->references('id')->on('cart_heads')->cascadeOnDelete();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('customer_address_id')->references('id')->on('customer_addresses');
            $table->foreign('transport_id')->references('id')->on('transports');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
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
