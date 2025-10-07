<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
})-> name('index');

Route::get('/productos', function () {
    return view('agregar_producto');
})-> name('productos');

Route::get('/productos/create', [App\Http\Controllers\ProductosController::class, 'create'])->name('productos.create');
Route::post('/productos', [App\Http\Controllers\ProductosController::class, 'store'])->name('productos.store');
