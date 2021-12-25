<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tipoevento extends Migration
{

    public function up()
    {
      Schema::create('tipoeventos', function (Blueprint $table){
        $table->increments('idte');
        $table->string('evento',50);
      });
    }

    public function down()
    {
        Schema::drop('tipoeventos');
    }
}
