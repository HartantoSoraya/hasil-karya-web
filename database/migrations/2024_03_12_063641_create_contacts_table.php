<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number')->nullable();
            $table->string('company_name')->nullable();
            $table->string('message')->nullable();
            $table->uuid('customer_service_id');
            $table->foreign('customer_service_id')->references('id')->on('customer_services')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
};
