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
            $table->text('course_curicullum');
            $table->text('course_description');
            $table->timestamps();
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
