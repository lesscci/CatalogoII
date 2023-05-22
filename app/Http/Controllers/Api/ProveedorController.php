<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()


    {
        $response = Http::withOptions(['verify' => false])->get('https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores');
        $jsonString = $response->body();
        $data = json_decode($jsonString);
        return view('proveedores.index', compact('data'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = Http::withOptions(['verify' => false])->get('https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores');
        $proveedor = $request->validate([
            "nombre" => "required",
            "direccion" => "required",
            "telefono" => "required"
        ]);
    
        $response = Http::withOptions(['verify' => false])->post("https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores", [
            "nombre" => $proveedor['nombre'],
            "direccion" => $proveedor['direccion'],
            "telefono" => $proveedor['telefono']
        ]);
    
        return redirect()->route("proveedores.index");
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $response = Http::withOptions(['verify' => false])->get('https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores/'.$id);
        
            $jsonString = $response->body();
        $proveedor = json_decode($jsonString);

        return view('proveedores.show', ['proveedor' => $proveedor[0]]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', ['proveedor' => $proveedor]);
        
    }
    

    /**
     * Update the specified resource in storage.
     */
 

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required'
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'direccion.required' => 'La dirección es obligatoria',
            'telefono.required' => 'El teléfono es obligatorio'
        ]);
    
        $proveedor = Proveedor::findOrFail($id);
    
        if (!$proveedor) {
            return redirect()->back()->with('error', 'Proveedor no encontrado');
        }
    
        $proveedor->nombre = $request->input('nombre');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->save();
    
        // Almacenar notificación en la sesión flash
        Session::flash('success', 'Proveedor actualizado con éxito');
    
        return redirect()->route('proveedores.index');
    
    
    
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
    
        if (!$proveedor) {
            return redirect()->back()->with('error', 'Proveedor no encontrado');
        }
    
        $proveedor->delete();
    
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado con éxito');
    }
    
}
