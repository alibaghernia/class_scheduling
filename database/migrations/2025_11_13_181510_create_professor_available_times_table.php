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
        Schema::create('professor_available_times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('professor_id')->constrained();
            $table->enum('weekday',
                ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday',]);
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('priority', ['low', 'medium', 'high']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professor_available_times');
    }
};
