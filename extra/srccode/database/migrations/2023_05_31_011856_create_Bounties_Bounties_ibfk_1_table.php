<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBountiesBountiesIbfk1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Bounties', function (Blueprint $table) {
            $table->foreign('question_id', 'Bounties_ibfk_1')->references('id')->on('Questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Bounties', function(Blueprint $table){
            $table->dropForeign('Bounties_ibfk_1');
        });
    }
}
