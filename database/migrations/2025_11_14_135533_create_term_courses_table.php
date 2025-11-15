<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('term_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('duration_minutes_per_week');
            $table->unsignedTinyInteger('group_counts');
            $table->text('note')->nullable();


            $table->foreignId('semester_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->morphs('course');
            $table->timestamps();
            $table->unique(['semester_id', 'course_id', 'course_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_courses');
    }
};
