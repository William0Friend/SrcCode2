<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDifficultyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Difficulty', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('question_id');
            $table->enum('difficulty', ['easy', 'medium', 'hard', 'not provided'])->default('not provided');
            
            $table->foreign('question_id', 'Difficulty_ibfk_1')->references('id')->on('Questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Difficulty');
    }
}
