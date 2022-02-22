<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
        'nombre', 'email', 'direccion','telefono','fecha_nac','empresa'
    ];
}
