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
        Schema::create('course_enroll', function (Blueprint $table) {
            $table->id();
            $table->longText('introduction_file');
            $table->longText('about_file');
            $table->longText('explanation_file');
            $table->longText('closing_file');
            $table->longText('assessment_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enroll');
    }
};
