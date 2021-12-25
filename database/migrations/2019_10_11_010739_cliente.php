
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cliente extends Migration
{
    public function up()
    {
      Schema::create('clientes', function(Blueprint $table){
        $table->increments('idcl');
        $table->string('nombre',20);
        $table->string('apellido1',20);
        $table->string('apellido2',20);
        $table->integer('edad');
        $table->string('sexo',1);
        $table->string('telefono',10);
              $table->string('direccion',50);
        $table->integer('ide')->unsigned();
  		    $table->foreign('ide')->references('ide')->on('estados');
        $table->string('email',50);
        $table->string('contraseña',50);
        $table->rememberToken();
        $table->timestamps();
      });
    }

    public function down()
    {
          Schema::drop('clientes');
    }
}
