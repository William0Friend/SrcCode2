<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Sales', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('seller_id');
            $table->integer('buyer_id');
            $table->text('source_code')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamp('timestamp')->nullable()->default('current_timestamp()');
            
            $table->foreign('seller_id', 'Sales_ibfk_1')->references('id')->on('users');
            $table->foreign('buyer_id', 'Sales_ibfk_2')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Sales');
    }
}
