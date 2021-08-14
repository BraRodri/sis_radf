<?php

use App\Http\Controllers\GuardiaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroArchivosController;
use App\Http\Controllers\SeccionalController;
use App\Http\Controllers\UsuariosController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    //home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    //usuarios
    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios');
    Route::post('/usuarios/create', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios/delete', [UsuariosController::class, 'delete'])->name('usuarios.delete');
    Route::get('/usuarios/view/{id}', [UsuariosController::class, 'view'])->name('usuarios.view');
    Route::post('/usuarios/updated', [UsuariosController::class, 'updated'])->name('usuarios.updated');

    //registro
    Route::get('/registro/archivos', [RegistroArchivosController::class, 'archivos'])->name('registro.archivos');
    Route::get('/registro/historial', [RegistroArchivosController::class, 'historial'])->name('registro.historial');
    Route::post('/registro/archivos/agregar', [RegistroArchivosController::class, 'agregarArchivos'])->name('registro.archivos.agregar');
    Route::post('/registro/archivos/registrar', [RegistroArchivosController::class, 'insert'])->name('registro.archivos.insert');
    Route::get('/registro/archivos/ver/{id}', [RegistroArchivosController::class, 'verConjuntoArchivos'])->name('registro.ver.archivos');

    //seccional
    Route::get('/seccional/brigada', [SeccionalController::class, 'brigada'])->name('seccional.brigada');
    Route::get('/seccional/batallones', [SeccionalController::class, 'batallones'])->name('seccional.batallones');
    Route::post('/seccional/brigada/user/create', [SeccionalController::class, 'createBrigada'])->name('seccional.brigada.create');
    Route::get('/seccional/brigada/user/delete/{id}', [SeccionalController::class, 'deleteBrigada'])->name('seccional.brigada.delete');
    Route::post('/seccional/batallones/user/create', [SeccionalController::class, 'createBatallon'])->name('seccional.batallon.create');
    Route::get('/seccional/batallones/user/delete/{id}', [SeccionalController::class, 'deleteBatallon'])->name('seccional.batallon.delete');

    //guardia
    Route::get('/guardia', [GuardiaController::class, 'index'])->name('guardia');
    Route::post('/guardia/crear', [GuardiaController::class, 'crear'])->name('guardia.crear');
    Route::get('/guardia/obtener', [GuardiaController::class, 'obtener'])->name('guardia.obtener');
    Route::post('/guardia/eliminar', [GuardiaController::class, 'eliminar'])->name('guardia.eliminar');
});

