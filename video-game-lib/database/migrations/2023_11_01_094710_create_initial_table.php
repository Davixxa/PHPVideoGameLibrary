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
            $table->string('username')->unique();
            $table->string('password');
            $table->string('role')->default('user');
            $table->timestamps();
        });

        Schema::create('game_users', function (Blueprint $table){
            $table->id();
            $table->string("role");
            $table->string("password");
            $table->string("username");
            $table->string("display");
            $table->string("email");
            $table->dateTime("date");
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
        });

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->date('publishing_date');
            $table->string('category');
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            //$table->integer("id")->autoIncrement()->primary();
            $table->timestamps();
            $table->string("description");
            $table->integer("scalar");
            $table->foreignId('game_id')->constrained('games');
        });

        Schema::create('favorite_lists', function (Blueprint $table){
            $table->id();
            $table->foreignId('game_id')->constrained('games');
            $table->foreignId('game_user_id')->constrained('game_users');
        });

        Schema::create('games_lists', function (Blueprint $table){
            $table->id();
            $table->foreignId('game_id')->constrained('games');
            $table->foreignId('game_user_id')->constrained('game_users');
        });

        Schema::create("category_lists", function (Blueprint $table){
            $table->id();
            $table->foreignId('game_id')->constrained('games');
            $table->foreignId('category_id')->constrained('categories');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //DO NOT REMOVE THE COMMENT IN THE DOWN()-METHOD, IT CAN CREATE PROBLEMS.
        //IF THE COMMENT IS REMOVED. AND THE COMMAND IS EXECUTED IN THE TERMINAL.
        //THEN ALL TABLES WILL BE DELETED FROM THE DATABASE.

        // No, that would be it working as intended. Laravel needs support for unmigration if possible. Fixed -Mia
        Schema::dropIfExists('game_users');
        Schema::dropIfExists('games');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('ratings');
        Schema::dropIfExists('favorite_lists');
        Schema::dropIfExists('games_lists');
        Schema::dropIfExists('category_lists');
    }
};
