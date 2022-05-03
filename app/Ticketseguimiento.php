<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticketseguimiento extends Model
{
    protected $fillable = [
        'id_ticket', 'fecha', 'status','descripcion','id_usuario'
    ];
}
