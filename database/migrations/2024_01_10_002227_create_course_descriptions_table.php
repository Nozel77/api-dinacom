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
        Schema::create('course_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('course_description_1');
            $table->string('course_description_2');
            $table->string('course_description_3');
            $table->string('course_description_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_descriptions');
    }
};
