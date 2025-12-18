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
        Schema::create('professors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('code')->unique()->nullable();
            $table->boolean('is_faculty_member');
            $table->decimal('min_units');
            $table->decimal('max_units')->nullable();
            $table->unsignedTinyInteger('max_classes')->nullable();
            $table->enum('status', ['active', 'inactive']);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professors');
    }
};
