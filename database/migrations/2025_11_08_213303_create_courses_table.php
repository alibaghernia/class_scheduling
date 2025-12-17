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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable(); // todo uniq code for major_specialization
            $table->unsignedTinyInteger('theory_units');
            $table->unsignedTinyInteger('practical_units');
            $table->decimal('equivalent_units');
            $table->unsignedInteger('duration')->comment('minutes per week');
            $table->text('note')->nullable();
            $table->unsignedTinyInteger('group_counts');
            $table->foreignId('semester_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
