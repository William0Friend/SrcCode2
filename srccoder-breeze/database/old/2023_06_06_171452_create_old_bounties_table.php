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
        Schema::create('old_bounties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id');
            $table->foreignId('user_id');
            $table->integer('amount');
//            $table->boolean('is_accepted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bounties');
    }
};