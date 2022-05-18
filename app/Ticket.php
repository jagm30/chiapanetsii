<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'id','solicitante', 'fecha', 'ubicacion','tipo','descripcion','fechafin','id_usuario','status','folio'
    ];
}
