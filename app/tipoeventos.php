<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoeventos extends Model
{
  protected $primaryKey = 'idte';
protected $fillable =['idte', 'evento'];
protected $date=['deleted_at'];
}
