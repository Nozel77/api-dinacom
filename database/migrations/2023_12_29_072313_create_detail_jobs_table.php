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
        Schema::create('detail_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('jobdesk');
            $table->string('location');
            $table->string('type_job');
            $table->text('company_image');
            $table->text('jobdesk_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_jobs');
    }
};
