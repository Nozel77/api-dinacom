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
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_hp')->after('email')->nullable();
            $table->string('role')->after('no_hp')->nullable();
            $table->integer('gender')->after('role')->nullable();
            $table->string('province')->after('gender')->nullable();
            $table->string('city')->after('province')->nullable();
            $table->string('birthdate')->after('city')->nullable();
            $table->string('profile_image')->after('birthdate')->nullable();
            $table->string('banner_image')->after('profile_image')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
