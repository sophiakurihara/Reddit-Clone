<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //create of modify tables
        Schema::create('contacts', function(Blueprint $table)
        {
            $table->increments('id'); //defaults NOT NULL
            $table->string('email')->unique();
            $table->string('first_name', 300);
            $table->string('last_name', 300);
            $table->string('number');
            $table->timestamps(); //created_at, updated_at DATETIME
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
        Schema::drop('contacts');
    }
}
