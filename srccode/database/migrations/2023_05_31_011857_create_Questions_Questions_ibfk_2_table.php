<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsQuestionsIbfk2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Questions', function (Blueprint $table) {
            $table->foreign('bounty_id', 'Questions_ibfk_2')->references('id')->on('Bounties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Questions', function(Blueprint $table){
            $table->dropForeign('Questions_ibfk_2');
        });
    }
}
