<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiesgoController;


Route::get('/', function () {
    return view('welcome');

});

Route::resource('riesgos',RiesgoController::class);
