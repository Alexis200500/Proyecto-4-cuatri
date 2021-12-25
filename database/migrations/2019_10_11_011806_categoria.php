<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categoria extends Migration
{

    public function up()
    {
      Schema::create('categorias', function(Blueprint $table){
      $table->increments('idca');
      $table->string('categoria',30);
    });
    }
    public function down()
    {
        Schema::drop('categorias');
    }
}
