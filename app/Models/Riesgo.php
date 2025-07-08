<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Riesgo extends Model
{
    //
    use HasFactory;
    protected $fillable=[
        'nombre',
        'descripcion',
        'nivel',
        'latitudUno',
        'longitudUno',
        'latitudDos',
        'longitudDos',
        'latitudTres',
        'longitudTres',
        'latitudCuatro',
        'longitudCuatro',
        'latitudCinco',
        'longitudCinco',
    ];
}
