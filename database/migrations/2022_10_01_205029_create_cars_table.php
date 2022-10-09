<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('model')->index();
            $table->string('manufacturer')->index();
            $table->string('image')->nullable();
            $table->integer('engine_size');
            $table->integer('power');
            $table->integer('capacity');
            $table->integer('max_speed');
            $table->integer('price');
            $table->string('engine_type');
            $table->boolean('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
};
