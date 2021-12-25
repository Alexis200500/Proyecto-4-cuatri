<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class puestos extends Model
{
  protected $primaryKey = 'idpue';
protected $fillable =['idpue', 'puesto','activo'];
protected $date=['deleted_at'];
}
