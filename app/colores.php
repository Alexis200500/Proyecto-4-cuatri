<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colores extends Model
{
  protected $primaryKey = 'idcolor';
protected $fillable =['idcolor', 'color','activo'];
protected $date=['deleted_at'];
}
