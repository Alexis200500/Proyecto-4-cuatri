<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
  protected $primaryKey = 'idpr';
protected $fillable =['idpr', 'producto','idca', 'idm', 'idr','idcolor','costo', 'archivo','activo'];
protected $date=['deleted_at'];
}
