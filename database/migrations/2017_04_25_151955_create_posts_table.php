<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creates Posts table
        Schema::create('posts', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title', 500);
            $table->string('url')->unique();
            $table->string('content', 1000);
            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop tables, or undo changes
        Schema::drop('posts');
    }
}
