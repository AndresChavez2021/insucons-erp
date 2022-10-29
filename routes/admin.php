<?php
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MarcaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProveedorController;
use App\Http\Controllers\Admin\CargoController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\CargoempleadoController;
use App\Http\Controllers\Admin\MedidaController;
use App\Http\Controllers\Admin\ServioController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\NotaController;
use App\Http\Controllers\Admin\MaterialservicioController;


Route::get('',[HomeController::class,'index']);
Route::resource('marcas', MarcaController::class)->names('admin.marcas');
Route::resource('proveedores', ProveedorController::class)->names('admin.proveedores');
Route::resource('cargos',CargoController::class)->names('admin.cargos');
Route::resource('personas',PersonaController::class)->names('admin.personas');
Route::resource('contratos',CargoempleadoController::class)->names('admin.contratos');
Route::resource('medidas',MedidaController::class)->names('admin.medidas');
Route::resource('servicios',ServioController::class)->names('admin.servicios');
Route::resource('materiales',MaterialController::class)->names('admin.materiales');
Route::resource('notas',NotaController::class)->names('admin.notas');
Route::resource('items',MaterialservicioController::class)->names('admin.items');

