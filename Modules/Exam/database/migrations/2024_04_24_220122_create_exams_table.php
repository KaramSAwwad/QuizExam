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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('speciality_id')->constrained('specialities');
            $table->foreignId('teacher_id')->constrained('teachers');
            $table->string('title');
            $table->integer('num_of_questions')->default(10);
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->enum('is_draft', ['true', 'false'])->default('false');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
