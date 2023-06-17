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
        Schema::create('old_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_user_id');
            $table->foreignId('answer_user_id');
            $table->foreignId('question_id');
            $table->foreignId('answer_id');
            $table->foreignId('question_bounty_id');
            $table->foreignId('tax_id');
            $table->float('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
