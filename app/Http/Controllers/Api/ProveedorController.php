<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;


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
        $proveedor = $request -> validate([
        "nombre"=>"required",
        "direccion"=> "required",
        "telefono" => "required"
        ]);

        $response->$request("POST", "proveedores", [
              "nombre"=>$proveedor['nombre'],
        "direccion"=> $proveedor['direccion'],
        "telefono" => $proveedor['telefono']
        ]);

        return redirect()->route("proveedores");
      
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $response = Http::withOptions(['verify' => false])->get('https://quirky-mahavira.217-76-154-49.plesk.page/api/proveedores/'.$id);
            $jsonString = $response->body();
            $proveedor = json_decode($jsonString);
            
            return view('proveedores.show', ['proveedor' => $proveedor]);
            

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('proveedores.edit');
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
            return response()->json(['message' => 'Proveedor ' . $proveedor->nombre . ' no encontrado'], 404);
        }
        $proveedor->nombre = $request->input('nombre');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->save();

        return response()->json(['message' => 'Proveedor ' . $proveedor->nombre . ' actualizado con éxito'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);

        if (!$proveedor) {
            return response()->json(['message' => 'Proveedor no encontrado'], 404);
        }

        $proveedor->delete();

        return response()->json(['message' => 'Proveedor eliminado con éxito'], 200);
    }
}
