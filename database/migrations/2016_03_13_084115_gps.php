<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('gps', function (Blueprint $table) {
            $table->increments('id');
            $table->date('NDate');
            $table->string('Adress',300);

            $table->string('Long', 500);
            $table->string('Lat', 500);
            $table->integer('user_id')->unsigned();
            $table->string('Contractor_Code',300);

            $table->string('Contractor_Name',300);
            $table->integer('Status')->unsigned();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade')
                  ->onupdate('cascade');
        
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
                Schema::drop('gps');
    }
}
