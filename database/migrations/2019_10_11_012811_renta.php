<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Renta extends Migration
{

    public function up()
    {
      Schema::create('rentas', function (Blueprint $table){
        $table->increments('idr');

        $table->integer('idcl')->unsigned();
          $table->foreign('idcl')->references('idcl')->on('clientes');

          $table->integer('idev')->unsigned();
            $table->foreign('idev')->references('idev')->on('eventos');

              $table->string('direccion',50);

        $table->integer('ide')->unsigned();
          $table->foreign('ide')->references('ide')->on('estados');

        $table->DateTime('fecharentar');
        $table->integer('costo');
        $table->integer('cantpersona');
        $table->rememberToken();
        $table->timestamps();
      });
    }


    public function down()
    {
        Schema::drop('rentas');
    }
}
