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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_type');
            $table->string('account_acl');
            $table->string('slug')->nullable()->unique();
            $table->string('name');
            $table->string('family');
            $table->string('mobile');
            $table->string('phone')->nullable();
            $table->string('account_image')->nullable();
            $table->string('email')->nullable();
            $table->date('birthday')->nullable();
            $table->string('mellicode')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('company')->nullable();
            $table->string('company_type')->nullable();
            $table->integer('ref_id')->default(0);
            $table->string('national_id')->nullable();
            $table->string('registration_number')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('account_status')->nullable();
            $table->string('deactivation_reason')->nullable();
            $table->string('description')->nullable();
            $table->string('interface_name')->nullable();
            $table->string('interface_mobile')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
