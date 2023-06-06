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
        Schema::create('blog_posts', function (Blueprint $table) {
              $table->id();
              /* We started adding code here*/
              $table->text('title');  // Title of our blog post          
              $table->text('body');   // Body of our blog post                  
              $table->text('user_id'); // user_id of our blog post author
              /* We stopped adding code here*/
              $table->timestamps();//Laravel will automatically add created_at and updated_at columns to our table
  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
