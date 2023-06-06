<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Question_Notes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('question_id');
            $table->longText('question_notes')->default('no extra notes provided');
            
            $table->foreign('question_id', 'Question_Notes_ibfk_1')->references('id')->on('Questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Question_Notes');
    }
}
