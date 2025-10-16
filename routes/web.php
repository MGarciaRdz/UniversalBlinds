<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\RegistroController;

Route::get('/', function () {return view('welcome');});

Route::get('/index', function () {return view('index');})-> name('index');

Route::get('/productos', function () {return view('agregar_producto');})-> name('productos');

Route::get('/index', [App\Http\Controllers\ProductosController::class, 'index'])->name('index');

//cargar vista crear productos
Route::get('/productos/create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');

//almacenar producto
Route::post('/productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');

//cargar vista registro
Route::get('/registro', [App\Http\Controllers\RegistroController::class, 'create'])->name('registro.create');

//almacenar registro
Route::post('/registro', [App\Http\Controllers\RegistroController::class, 'store'])->name('registro.store');

//cargar vista login
Route::get('/login', [App\Http\Controllers\LoginController::class, 'create'])->name('login.create');

//almacenar login
Route::post('/login', [App\Http\Controllers\LoginController::class, 'store'])->name('login.store');

//ruta para el administrador
Route::get('/admin', [App\Http\Controllers\Administrador::class, 'index'])->name('admin.index');
