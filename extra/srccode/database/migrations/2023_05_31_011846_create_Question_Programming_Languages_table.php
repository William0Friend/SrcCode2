<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionProgrammingLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Question_Programming_Languages', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('question_id')->nullable();
            $table->integer('programming_languages_id')->nullable();
            
            $table->foreign('question_id', 'Question_Programming_Languages_ibfk_1')->references('id')->on('Questions');
            $table->foreign('programming_languages_id', 'Question_Programming_Languages_ibfk_2')->references('id')->on('Programming_Language');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Question_Programming_Languages');
    }
}
