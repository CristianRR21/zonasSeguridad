<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\ZonaSeguraController;
use App\Http\Controllers\PuntoEncuentroController;


Route::get('/', function () {
    return view('welcome');

});

Route::get('/puntoEncuentros/mapa', [PuntoEncuentroController::class, 'mapa']);
Route::resource('puntoEncuentros', PuntoEncuentroController::class);

Route::get('/zonas/mapa', [ZonaSeguraController::class, 'mapa']);
Route::get('/riesgos/mapa', [RiesgoController::class, 'mapa']);
Route::resource('riesgos',RiesgoController::class);



Route::resource('zonas', ZonaSeguraController::class);
