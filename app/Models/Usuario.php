<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'genero',
        'direccion',
        'telefono',
        'email',
        'nombre_adm',
        'contrasenia',
        'fotografia',
    ];
}
