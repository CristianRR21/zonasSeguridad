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


Route::get('/puntoEncuentros/mapa', [PuntoEncuentroController::class, 'mapa']);
Route::resource('puntoEncuentros', PuntoEncuentroController::class);

Route::get('/zonas/mapa', [ZonaSeguraController::class, 'mapa']);
Route::get('/riesgos/mapa', [RiesgoController::class, 'mapa']);
Route::resource('riesgos',RiesgoController::class);

Route::resource('users', UserController::class);




Route::resource('zonas', ZonaSeguraController::class);


Route::post('users/login', [UserController::class, 'login'])->name('users.login');

Route::post('/logout', [UserController::class, 'logout'])->name('logout');



Route::get('/admin/inicio', function () {
    return view('layout.administrador');
});

Route::get('/visitante/inicio', function () {
    return view('layout.visitante');
});


Route::get('/registrarse', function () {
    return view('login.registrarse');  
});

Route::get('/riesgos/visitantes', [RiesgoController::class, 'visitantes']);
