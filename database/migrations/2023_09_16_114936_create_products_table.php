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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('product_name');
            $table->text('abstract')->nullable();
            $table->text('content')->nullable();
            $table->string('purchase_price');
            $table->string('inventory')->default('0');
            $table->string('sales_price');
            $table->string('offer_price')->nullable();
            $table->integer('user_id');
            $table->integer('account_id');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
