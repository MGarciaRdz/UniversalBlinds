<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RegistroController;
use App\Http\Middleware\Registro_y_Login;
use App\Http\Middleware\roleMiddleware;

Route::get('/', function () {return view('welcome');});

// RUTAS PROTEGIDAS (sólo usuarios logueados)

Route::middleware([Registro_y_Login::class])->group(function () {

    //vista index con productos
    Route::get('/index', [App\Http\Controllers\ProductosController::class, 'index'])->name('index');

        
    //cerrar sesion
    Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


    // Solo los admins pueden acceder
    Route::middleware([roleMiddleware::class])->group(function () {
                
        //ruta para el administrador
        Route::get('/admin', [App\Http\Controllers\Administrador::class, 'index'])->name('admin.index');

        //cargar vista crear producto
        Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');

        //almacenar producto
        Route::post('/productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
    });

});

//---------------------------------------------------------------------------------------------------------------------------------------
// 
// //Vistas publicas


//cargar vista registro
Route::get('/registro', [App\Http\Controllers\RegistroController::class, 'create'])->name('registro.create');

//almacenar registro
Route::post('/registro', [App\Http\Controllers\RegistroController::class, 'store'])->name('registro.store');

//cargar vista login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'create'])->name('login.create');

//almacenar login
Route::post('/login', [App\Http\Controllers\LoginController::class, 'store'])->name('login.store');
