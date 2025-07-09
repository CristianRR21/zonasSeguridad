<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\ZonaSeguraController;
use App\Http\Controllers\PuntoEncuentroController;


Route::get('/', function () {
    return view('welcome');

});

Route::resource('puntoEncuentros', PuntoEncuentroController::class);

Route::resource('riesgos',RiesgoController::class);

Route::resource('zonas', ZonaSeguraController::class);