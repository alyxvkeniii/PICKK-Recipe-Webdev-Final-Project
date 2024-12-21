<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id'); // Auto-incrementing primary key
            $table->unsignedInteger('recipe_id'); // Foreign key to recipes
            $table->unsignedBigInteger('user_id'); // Foreign key to users
            $table->text('comment'); // TEXT for the comment
            $table->timestamps(); // Adds "created_at" and "updated_at" columns

            // Foreign key constraints
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
