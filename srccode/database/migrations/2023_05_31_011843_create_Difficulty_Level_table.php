<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDifficultyLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Difficulty_Level', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('question_id');
            $table->enum('difficulty_level', ['1', '2', '3', '4', '5', '-1'])->default('-1');
            
            $table->foreign('question_id', 'Difficulty_Level_ibfk_1')->references('id')->on('Questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Difficulty_Level');
    }
}
