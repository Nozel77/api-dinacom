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
        Schema::create('enroll_course', function (Blueprint $table) {
            $table->id();
            $table->string('introduction_file');
            $table->string('about_file');
            $table->string('content_file');
            $table->string('closing_file');
            $table->string('assessment_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enroll_course');
    }
};
