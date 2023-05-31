<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTechnologyCatagoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Question_Technology_Catagory', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('question_id')->nullable();
            $table->integer('technology_catagory_id')->nullable();
            
            $table->foreign('question_id', 'Question_Technology_Catagory_ibfk_1')->references('id')->on('Questions');
            $table->foreign('technology_catagory_id', 'Question_Technology_Catagory_ibfk_2')->references('id')->on('Technology_Catagory');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Question_Technology_Catagory');
    }
}
