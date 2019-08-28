<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
             $table->increments('id');
             $table->string('name');
             $table->timestamps();
         });
 
 
         Schema::create('cities', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('state_id');
             $table->string('name');
             $table->timestamps();
         });
    }
    public function down()
    {
        Schema::drop('cities');
        Schema::drop('states');
    }
}
