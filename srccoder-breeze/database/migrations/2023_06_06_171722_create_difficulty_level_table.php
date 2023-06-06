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
        Schema::create('difficulty_level', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->enum('difficulty_level', [0, 1, 2, 3, 4, 5, -1])->default(-1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('difficulty_level');
    }
};
