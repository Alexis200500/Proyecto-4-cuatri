<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usuarios extends Model
{
       protected $primaryKey = 'idu';
  protected $fillable=['idu','nombre','apellido','tipo','correo', 'password','archivo', 'activo'];
    protected $date=['deleted_at'];
}
