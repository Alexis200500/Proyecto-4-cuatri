<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventos extends Model
{
  protected $primaryKey = 'idev';
protected $fillable =['idev', 'idcl','idte','direccion', 'ide', 'fechaevento','costo','cantpersonas','idad','activo'];
protected $date=['deleted_at'];
}
