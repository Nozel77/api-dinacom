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
        Schema::create('course_curicullum', function (Blueprint $table) {
            $table->id();
            $table->string('course_curicullum_1');
            $table->string('course_curicullum_2');
            $table->string('course_curicullum_3');
            $table->string('course_curicullum_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_curicullum');
    }
};
