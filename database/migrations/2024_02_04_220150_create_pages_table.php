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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('component_id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->text('abstract')->nullable();
            $table->string('publish_status');
            $table->string('thumbnail')->nullable();
            $table->integer('thumbnail_status')->nullable()->default(0);
            $table->integer('post_order')->nullable()->default(0);
            $table->string('author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
