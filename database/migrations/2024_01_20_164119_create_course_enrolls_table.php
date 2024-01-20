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
        Schema::table('course_enrolls', function (Blueprint $table) {
            // $table->id();
            // $table->text('introduction_title')->nullable();
            // $table->text('introduction_file')->nullable();
            // $table->enum('introduction_status_progress', ['done', 'ongoing', 'lock'])->default('ongoing');

            // $table->text('about_title')->nullable();
            // $table->text('about_file')->nullable();
            // $table->enum('about_status_progress', ['done', 'ongoing', 'lock'])->default('lock');

            // $table->text('content_title')->nullable();
            // $table->text('content_file')->nullable();
            // $table->enum('content_status_progress', ['done', 'ongoing', 'lock'])->default('lock');

            // $table->text('closing_title')->nullable();
            // $table->text('closing_file')->nullable();
            // $table->enum('closing_status', ['done', 'ongoing', 'lock'])->default('lock');

            $table->text('question')->nullable();

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_enrolls');
    }
};
