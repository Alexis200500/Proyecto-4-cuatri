<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admins extends Model
{
  protected $primaryKey = 'idad';
protected $fillable =['idad', 'nombre', 'apellido1', 'apellido2',
                  'edad', 'sexo', 'telefono','direccion', 'ide','idpue','email','contraseña'];
protected $date=['deleted_at'];
}
