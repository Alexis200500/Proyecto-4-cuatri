<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estados extends Model
{
    protected $primaryKey = 'ide';
    protected $fillable =['ide', 'estado','activo'];
    protected $date=['deleted_at'];
}
