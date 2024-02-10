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
        Schema::create('confirm_customers', function (Blueprint $table) {
            $table->id();
            $table->string('method')->comment('روش احراز');
            $table->string('value')->comment('موبایل یا ایمیل');
            $table->string('code')->comment('کد');
            $table->integer('status')->default(0)->comment('وضعیت');
            $table->dateTime('expire_at')->comment('زمان انقضا');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('confirm_customers');
    }
};
