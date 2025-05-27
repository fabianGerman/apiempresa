<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorProveedor;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/proveedor/listar',[ControladorProveedor::class,'listar_proveedores']);