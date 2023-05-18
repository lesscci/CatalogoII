<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Registro
Route::post('/register',[AuthController::class, 'register']);
//Login
Route::post('/login', [AuthController::class,'login']);
//infUser
Route::post('/infUser', [AuthController::class,'infUser'])->Middleware('auth:sanctum');
Route::post('/logout', [AuthController::class,'logout']);


//Ruta controlador de Productos
Route::resource('productos', 'App\Http\Controllers\Api\ProductoController');
//PROVEEDORES   
Route::resource('proveedores', 'App\Http\Controllers\Api\ProveedorController');


Route::get('/api/productos/{id}', [ProductoController::class, 'show']);



// Rutas para el controlador de Proveedor
Route::get('/proveedores', [App\Http\Controllers\Api\ProveedorController::class, 'index'])->name('proveedores.index');
Route::get('/proveedores/create', [App\Http\Controllers\Api\ProveedorController::class, 'create'])->name('proveedores.create');
Route::post('/proveedores', [App\Http\Controllers\Api\ProveedorController::class, 'store'])->name('proveedores.store');
Route::get('/proveedores/{proveedor}', [App\Http\Controllers\Api\ProveedorController::class, 'show'])->name('proveedores.show');
Route::get('/proveedores/{proveedor}/edit', [App\Http\Controllers\Api\ProveedorController::class, 'edit'])->name('proveedores.edit');
Route::put('/proveedores/{proveedor}', [App\Http\Controllers\Api\ProveedorController::class, 'update'])->name('proveedores.update');
Route::delete('/proveedores/{proveedor}', [App\Http\Controllers\Api\ProveedorController::class, 'destroy'])->name('proveedores.destroy');
