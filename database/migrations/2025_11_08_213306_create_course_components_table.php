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
        Schema::create('course_components', function (Blueprint $table) {
            $table->id();
            $table->foreignId('composite_course_id')->comment('merged course')
                ->constrained('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('component_course_id')
                ->constrained('courses')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
            $table->unique(['composite_course_id', 'component_course_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_components');
    }
};
