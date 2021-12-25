<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class materiales extends Model
{
  protected $primaryKey = 'idm';
protected $fillable =['idm', 'material','activo'];
protected $date=['deleted_at'];
}
