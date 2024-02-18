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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0)->comment('کد نظر والد');
            $table->integer('customer_id')->default(0)->comment('کد مشتری');
            $table->integer('post_id')->default(0)->comment('کد محتوا');
            $table->string('name')->nullable()->comment('نام شخص');
            $table->string('mobile')->nullable()->comment('موبایل');
            $table->string('email')->nullable()->comment('ایمیل');
            $table->longText('text')->comment('متن');
            $table->string('status')->comment('وضعیت');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
