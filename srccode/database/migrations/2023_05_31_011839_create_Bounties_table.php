<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateBountiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bounties', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('question_id');
            $table->integer('user_id');
            $table->integer('amount')->default(5);
            $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
            
            $table->foreign('user_id', 'Bounties_ibfk_2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Bounties');
    }
}
