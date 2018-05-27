<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('cover');
            $table->string('vehicle');
            $table->float('time');
            $table->float('cost');
            $table->string('start_address');
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
        Schema::dropIfExists('tours');
    }
}
