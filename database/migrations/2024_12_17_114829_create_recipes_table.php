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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id(); // Auto-incrementing unsignedBigInteger for the primary key
            $table->string('name'); // VARCHAR for recipe name
            $table->unsignedBigInteger('user_id'); // Integer for referencing users
            $table->string('image')->nullable(); // Image as a VARCHAR, optional
            $table->text('description')->nullable(); // TEXT for recipe description
            $table->text('ingredients')->nullable(); // TEXT for recipe ingredients
            $table->text('instructions')->nullable(); // TEXT for recipe instructions
            $table->integer('ratings')->default(0); // Integer for ratings, default to 0
            $table->string('categories')->nullable(); // Categories, optional
            $table->string('status')->default(1); // Status, default to 1
            $table->timestamps(); // Adds "created_at" and "updated_at" columns

            // Foreign key constraint for user_id referencing the users table
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
        Schema::dropIfExists('recipes');
    }
};
