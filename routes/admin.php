<?php
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\ProveedoreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProveedorController;

Route::get('',[HomeController::class,'index']);
Route::resource('marcas', MarcaController::class)->names('admin.marcas');
Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');
