<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('file_name');
            $table->dateTime('uploaded_on');
            $table->enum('status', ['1', '0'])->default('1');
            $table->integer('user_id');
            
            $table->foreign('user_id', 'fk_user')->references('id')->on('users');
            $table->foreign('user_id', 'images_ibfk_1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
