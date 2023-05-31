<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Answers', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id');
            $table->integer('question_id');
            $table->text('body')->nullable();
            $table->timestamp('timestamp')->nullable()->default('current_timestamp()');
            $table->mediumblob('file')->nullable();
            $table->string('file_path')->nullable();
            $table->longText('code_body')->nullable();
            
            $table->foreign('user_id', 'Answers_ibfk_1')->references('id')->on('users');
            $table->foreign('question_id', 'Answers_ibfk_2')->references('id')->on('Questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Answers');
    }
}
