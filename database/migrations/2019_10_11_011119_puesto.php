<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Puesto extends Migration
{

    public function up()
    {
      Schema::create('puestos', function (Blueprint $table){
        $table->increments('idpue');
        $table->string('puesto',30);
      });
    }

    public function down()
    {
      Schema::drop('puestos');
    }
}
