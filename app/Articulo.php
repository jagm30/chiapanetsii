<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable = [
        'descripcion','marca','modelo','serie','status','color','fecha_compra','categoria','metodologia','etiqueta'
    ];
}
