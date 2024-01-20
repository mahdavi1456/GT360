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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('component_id');
            $table->string('title');
            $table->text('slug');
            $table->text('content');
            $table->text('abstract')->nullable();
            $table->integer('publish_status')->default(0);
            $table->string('thumbnail')->nullable();
            $table->integer('thumbnail_status')->nullable()->default(1);
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
        Schema::dropIfExists('posts');
    }
};
