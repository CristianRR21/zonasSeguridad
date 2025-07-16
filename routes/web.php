<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiesgoController;
use App\Http\Controllers\ZonaSeguraController;
use App\Http\Controllers\PuntoEncuentroController;
use App\Http\Controllers\UserController;

Route::get('/login', function () {
    return view('login.login');
})->name('login');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/registrarse', function () {
    return view('login.registrarse');
});


Route::get('/riesgos/visitantes', [RiesgoController::class, 'visitantes']);

// Rutas que necesitan autenticación
Route::middleware(['auth'])->group(function () {


    Route::get('/admin/inicio', function () {
        return view('layout.administrador');
    });


    Route::get('/usuariosVista/usuarioPunto', [UserController::class, 'usuarioPunto']);
    Route::get('/usuariosVista/usuarioRiesgo', [UserController::class, 'usuarioRiesgo']);
    Route::get('/usuariosVista/usuarioZona', [UserController::class, 'usuarioZona']);


    Route::resource('puntoEncuentros', PuntoEncuentroController::class);
    Route::resource('riesgos', RiesgoController::class);
    Route::resource('zonas', ZonaSeguraController::class);
    Route::resource('users', UserController::class);


    Route::post('/logout', [UserController::class, 'logout'])->name('logout');


    Route::get('/puntoEncuentros/mapa', [PuntoEncuentroController::class, 'mapa']);
    Route::get('/zonas/mapa', [ZonaSeguraController::class, 'mapa']);
    Route::get('/riesgos/mapa', [RiesgoController::class, 'mapa']);
});


Route::post('users/login', [UserController::class, 'login'])->name('users.login');

