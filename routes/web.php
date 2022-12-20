<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\PilotoController;
use App\Http\Controllers\VueloController;
use App\Http\Controllers\PasajeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('alumnos/pdf', [AlumnoController::class, 'listadoPdf'])->name(
    'alumnos.pdf'
);

Route::resource("alumnos", AlumnoController::class);
Route::get('libros/pdf', [LibroController::class, 'listadoPdf'])->name(
    'libros.pdf'
);
Route::resource("libros", LibroController::class);

Route::resource("recetas", RecetaController::class);

Route::get('pilotos/vuelos/{id}', [PilotoController::class, 'listadoVuelos'])->name(
    'pilotos.vuelos'
);
Route::resource("pilotos", PilotoController::class);
Route::resource("vuelos", VueloController::class);

Route::get('pasajes/sumar/{id}', [PasajeController::class, 'sumar'])->name(
    'pasajes.sumar'
);
Route::get('pasajes/restar/{id}', [PasajeController::class, 'restar'])->name(
    'pasajes.restar'
);
Route::resource("pasajes", PasajeController::class);