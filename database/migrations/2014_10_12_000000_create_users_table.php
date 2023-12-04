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
        Schema::create('users', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->foreignId('current_team_id')->nullable();
            // $table->string('profile_photo_path', 2048)->nullable();
            // $table->timestamps();
            $table->id();
            $table->string('student_id')->unique();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('gender');
            $table->date('birthday');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('age');
            $table->string('email')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('section_name')->nullable();
            $table->string('grade_level');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('role')->default(0);
            $table->integer('isEnrolled')->default(0);
            $table->string('name_guardian')->nullable();
            $table->integer('contact_guardian')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
