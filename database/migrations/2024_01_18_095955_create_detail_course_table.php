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
        Schema::create('detail_course', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('difficulty');
            $table->string('category');
            $table->timestamps();
        });

        Schema::create('detail_course_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_course_id');
            $table->string('course_curicullum');
            $table->string('course_description');
            $table->timestamps();

            $table->foreign('detail_course_id')->references('id')->on('detail_course')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_course');
    }
};
