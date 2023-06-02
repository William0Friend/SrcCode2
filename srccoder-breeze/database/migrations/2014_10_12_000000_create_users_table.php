<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // added
            //$table->string('username')->unique();
            // $table->string('password');
            //$table->string('email')->unique();
            //$table->string('reputation')->default('0');
            //$table->string('image_id');
            //$table->boolean('is_admin')->default(false);
            //for possible linking in future
            // $table->string('bio')->default('No bio yet');
            // $table->string('location')->default('No location yet');
            // $table->string('website')->default('No website yet');
            // $table->string('github')->default('No github yet');
            // $table->string('twitter')->default('No twitter yet');
            // $table->string('linkedin')->default('No linkedin yet');
            // $table->string('facebook')->default('No facebook yet');
            // $table->string('youtube')->default('No youtube yet');
            // $table->string('instagram')->default('No instagram yet');
            // $table->string('stackoverflow')->default('No stackoverflow yet');
            // $table->string('devto')->default('No devto yet');

            //table->time
            // $table->boolean('is_admin')->default(false);
            // end added
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
