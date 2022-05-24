<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hojaservicio extends Model
{
    protected $fillable = [
        'folio', 'motivo','fecha','id_cliente','id_usuario','ubicacion','tipo_servicio','id_equipo','detalle','solucion','proximoservicio','fecha_entrega','status'
    ];
}
