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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('gender');
            $table->string('admission_number')->unique();
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->foreignId('stream_id')->constrained('classes')->onDelete('cascade');
            $table->string('dormitory');
            $table->string('medical_conditions')->nullable();
            $table->string('allergies')->nullable();
            $table->string('emergency_contact');
            $table->string('parent_name');
            $table->string('relationship');
            $table->string('parent_phone');
            $table->string('parent_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
