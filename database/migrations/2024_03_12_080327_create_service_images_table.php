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
        Schema::create('service_images', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->uuid('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
            $table->string('image');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('service_images');
    }
};
