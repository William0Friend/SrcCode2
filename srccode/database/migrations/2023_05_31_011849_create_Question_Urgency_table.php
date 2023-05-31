<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionUrgencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Question_Urgency', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('question_id');
            $table->enum('Question_Urgency', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '-1'])->default('-1');
            
            $table->foreign('question_id', 'Question_Urgency_ibfk_1')->references('id')->on('Questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Question_Urgency');
    }
}
