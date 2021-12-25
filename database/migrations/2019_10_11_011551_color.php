<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Color extends Migration
{

    public function up()
    {
      Schema::create('colores', function (Blueprint $table){
        $table->increments('idcolor');
        $table->string('color',30);
      });
    }

    public function down()
    {
      Schema::drop('colores');
    }
}
