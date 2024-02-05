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
        Schema::create('reserve_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('نام');
            $table->string('details')->comment('توضیحات');
            $table->double('price')->comment('هزینه');
            $table->double('off_price')->nullable()->comment('هزینه با تخفیف');
            $table->string('status')->comment('وضعیت');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve_parts');
    }
};
