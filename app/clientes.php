<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
  protected $primaryKey = 'idcl';
  protected $fillable =['idcl','nombre', 'apellido1', 'apellido2','edad','sexo','telefono',
                          'direccion', 'ide','archivo','activo', 'email', 'contraseña'];

                            protected $date=['deleted_at'];
}
