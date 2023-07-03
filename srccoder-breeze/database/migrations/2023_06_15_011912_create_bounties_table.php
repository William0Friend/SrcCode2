<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
//     public function up(): void
//     {
//         Schema::create('bounties', function (Blueprint $table) {
//             $table->id();
//             $table->foreignId('question_id');
//             // $table->foreignId('user_id');
//             $table->integer('bounty')->default(0);
// //            $table->boolean('is_accepted')->default(false);
//             $table->timestamps();
//         });
//     }
    public function up()
    {
        Schema::create('bounties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->integer('bounty');
            $table->string('payment_intent_id');
            $table->boolean('status')->default(1); // 1 for open, 0 for closed
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bounties');
    }
};
