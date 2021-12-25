<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rentas extends Model
{
  protected $primaryKey = 'idr';
protected $fillable =['idr', 'idcl','idev','direccion', 'ide', 'fecharentar','costo','cantpersona','activo'];
protected $date=['deleted_at'];
}
