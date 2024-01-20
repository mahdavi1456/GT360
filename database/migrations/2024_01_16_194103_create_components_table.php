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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('نام');
            $table->string('label')->comment('برچسب');
            $table->string('slogan')->nullable()->comment('معرفی کوتاه');
            $table->longText('details')->nullable()->comment('توضیحات');
            $table->string('preview')->nullable()->comment('تصویر پیش نمایش');
            $table->string('status')->nullable()->comment('وضعیت');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
