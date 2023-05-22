<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar(Request $request)
{
    // Obtener el ID del producto desde el formulario
    $productoId = $request->input('producto_id');

    // Aquí puedes implementar la lógica para agregar el producto al carrito
    // Puedes almacenar el ID del producto en la sesión o en una tabla de la base de datos, según tu implementación

    // Redirigir al usuario a la página del carrito o a donde desees
    return redirect()->route('producto.index')->with('success', 'Producto agregado al carrito.');
}
}
