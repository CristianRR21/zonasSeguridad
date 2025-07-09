<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\ZonaSeguraController;


Route::get('/', function () {
    return view('welcome');

});

Route::resource('riesgos',RiesgoController::class);

Route::resource('zonas', ZonaSeguraController::class);