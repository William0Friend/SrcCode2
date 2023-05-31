<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Questions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id');
            $table->string('title');
            $table->text('body')->nullable();
            $table->timestamp('timestamp')->nullable()->default('current_timestamp()');
            $table->integer('bounty_id')->nullable();
            $table->integer('programming_language_id')->nullable();
            $table->integer('technology_catagory_id')->nullable();
            
            $table->foreign('user_id', 'Questions_ibfk_1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Questions');
    }
}
