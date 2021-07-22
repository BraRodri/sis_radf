<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
});

