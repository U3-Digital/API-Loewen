<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $fillable = [
        'destacada',
        'oferta',
        'titulo',
        'status',
        'precio',
        'precioOferta',
        'condVenta',
        'categoria',
        'areaTerreno',
        'areaConstruccion',
        'habitaciones',
        'banos',
        'direccion',
        'ciudad',
        'estado',
        'CP',
        'latitud',
        'longitud',
        'fotoPrincipal',
        'fotos',
        'detalles',
        'caracteristicas',
        'vendedor',
        'moneda'
    ];

    /*protected $hidden = [
        'fechaRegistro'
    ];*/
}
