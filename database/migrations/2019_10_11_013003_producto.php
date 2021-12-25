<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Producto extends Migration
{

    public function up()
    {

                  Schema::create('productos', function (Blueprint $table){
                    $table->increments('idpr');
                    $table->string('producto',50);
                    $table->integer('idca')->unsigned();
                      $table->foreign('idca')->references('idca')->on('categorias');
                      $table->integer('idm')->unsigned();
                        $table->foreign('idm')->references('idm')->on('materiales');

                        $table->integer('idr')->unsigned();
                          $table->foreign('idr')->references('idr')->on('rentas');
                        $table->integer('idcolor')->unsigned();
                          $table->foreign('idcolor')->references('idcolor')->on('colores');
                    $table->integer('costo');
                    $table->text('Imagen');
                    $table->rememberToken();
                    $table->timestamps();
                  });
    }


    public function down()
    {
          Schema::drop('productos');
    }
}
