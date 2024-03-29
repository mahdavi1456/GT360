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
        Schema::create('nav_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreignId('nav_id');
            $table->foreign('nav_id')->references('id')->on('navs')->onDelete('cascade');
            $table->string('name');
            $table->string('link');
            $table->string('target');
            $table->string('rel');
            $table->string('tag_id')->nullable();
            $table->string('tag_class')->nullable();
            $table->string('item_type');
            $table->bigInteger('object_id');
            $table->integer('order_num');
            $table->bigInteger('parent_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nav_items');
    }
};
