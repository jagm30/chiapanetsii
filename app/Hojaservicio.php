<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hojaservicio extends Model
{
    protected $fillable = [
        'id_ticket','folio', 'motivo','fecha','id_cliente','id_usuario','ubicacion','tipo_servicio','id_equipo','detalle','solucion','oplimpieza','opprueba','opcotejado','oprevfisica','proximoservicio','fecha_entrega','status'
    ];
}
