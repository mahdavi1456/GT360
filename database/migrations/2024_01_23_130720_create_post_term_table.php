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
        Schema::create('post_term', function (Blueprint $table) {
            $table->foreignId('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreignId('term_id');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
           $table->primary(['post_id','term_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_term');
    }
};
