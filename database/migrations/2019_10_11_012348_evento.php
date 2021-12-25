<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evento extends Migration
{

    public function up()
    {
      Schema::create('eventos', function (Blueprint $table){
        $table->increments('idev');

        $table->integer('idcl')->unsigned();
          $table->foreign('idcl')->references('idcl')->on('clientes');

          $table->integer('idte')->unsigned();
            $table->foreign('idte')->references('idte')->on('tipoeventos');

              $table->string('direccion',50);

        $table->integer('ide')->unsigned();
          $table->foreign('ide')->references('ide')->on('estados');

        $table->DateTime('fechaevento');
        $table->integer('costo');
        $table->integer('cantpersona');
        $table->integer('idad')->unsigned();
          $table->foreign('idad')->references('idad')->on('admins');
        $table->rememberToken();
        $table->timestamps();
      });
    }

    public function down()
    {
          Schema::drop('eventos');
    }
}
