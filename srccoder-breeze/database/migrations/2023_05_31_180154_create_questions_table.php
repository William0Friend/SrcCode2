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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // user_id of our question
            $table->text('title');  // Title of our question
            $table->longText('body');   // Body of our question
            $table->foreignId('bounty_id');
            $table->foreignId('programming_language_id');
            $table->foreignId('technology_category_id');
            $table->string('slug')->unique();//slug is a url friendly version of the title
            $table->boolean('is_answered')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
