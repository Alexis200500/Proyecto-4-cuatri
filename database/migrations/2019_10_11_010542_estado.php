<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Estado extends Migration
{

    public function up()
    {
      Schema::create('estados', function (Blueprint $table){
        $table->increments('ide');
        $table->string('estado',30);
      });
    }


    public function down()
    {
      Schema::drop('estados');
    }
}
