<?php

namespace App\Http\Controllers;

use App\Models\Carros;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carros = Carros::all();
        return response()->json($carros);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carros = new Carros;
        $carros->modelo = $request->modelo;
        $carros->agencia = $request->agencia;
        $carros->color = $request->color;
        $carros->precio = $request->precio;
        $carros->imagen = $request->imagen; 
        $carros->descripcion = $request->descripcion;
        $carros->save();

        return response()->json([
            "message" => "Registro agregado correctamente!"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $carros = Carros::find($id);
        if (!empty($carros)){

            return response() ->json($carros);

        }
        else {

            return response()->json([
                "message" =>"El registro no se encuentra."
                ]);

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $carros = Carros::find($id);
        $carros->modelo = $request->modelo;
        $carros->agencia = $request->agencia;
        $carros->color = $request->color;
        $carros->precio = $request->precio;
        $carros->imagen = $request->imagen;
        $carros->descripcion = $request->descripcion; 
        $carros->save();

        return response()->json([
            "message" => "Registro actualizado correctamente!"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carros= Carros::find($id);
        $carros ->delete();

        return response()->json([
            "message" =>"El registro ha sido eliminado correctamente! "
            ]);
    }
}
