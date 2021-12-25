<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Material extends Migration
{

    public function up()
    {
      Schema::create('materiales', function (Blueprint $table){
        $table->increments('idm');
        $table->string('material',30);
      });
    }

    public function down()
    {
        Schema::drop('materiales');
    }
}
