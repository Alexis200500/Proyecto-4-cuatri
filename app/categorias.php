<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
  protected $primaryKey = 'idca';
protected $fillable =['idca', 'categoria'];
protected $date=['deleted_at'];
}
