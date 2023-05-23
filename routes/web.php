<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\ProductController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
  //  Route::post('/carrito/agregar', 'App\Http\Controllers\CarritoController@agregar')->name('carrito.agregar');
    Route::post('/carrito/agregar', [CarritoController::class, 'addToCart'])->name('carrito.agregar');


    Route::get('/products/create', [ProductoController::class, 'create'])->name('productos.create');

