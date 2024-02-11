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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('account_id')->comment('کد اشتراک');
            $table->string('authority')->comment('شناسه درخواست');
            $table->tinyInteger('status')->nullable()->comment('وضعیت پرداخت');
            $table->integer('ref_id')->nullable()->comment('رسید پرداخت');
            $table->integer('record_id')->nullable()->comment('کد مورد');
            $table->string('record_type')->nullable()->comment('نوع مورد');
            $table->string('message')->nullable()->comment('پیام وضعیت پرداخت');
            $table->double('price')->comment('مبلغ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
