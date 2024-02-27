<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserve_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('rp_id');
            $table->string('ro_date')->comment('تاریخ رزرو');
            $table->string('rp_name')->comment('نام سانس');
            $table->string('rp_details')->comment('توضیحات سانس');
            $table->double('rs_price')->comment('مبلغ');
            $table->string('ro_name')->nullable()->comment('نام مشتری');
            $table->integer('ro_count')->comment('تعداد');
            $table->string('ro_mobile')->nullable()->comment('موبایل');
            $table->string('ro_status')->default(0)->comment('وضعیت');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve_orders');
    }
};
