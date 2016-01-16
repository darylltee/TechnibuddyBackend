<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Techniusers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Create techniusers table
        if(!Schema::hasTable('techniusers'))
        {
             Schema::create('techniusers', function(Blueprint $table)
            {
                $table->increments('techniuserid')->primary();
                $table->string("username",30)->nullable()->unique();
                $table->string('password',50)->nullable();
                $table->string('email',30)->nullable()->unique();
                $table->dateTime('registered_at')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         if(Schema::hasTable('techniusers'))
                Schema::drop("techniusers");
    }
}
