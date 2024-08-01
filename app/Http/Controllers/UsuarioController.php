<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameUser' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8',
            'imagen' => 'nullable|url', // Validar el campo imagen como URL
        ]);

        $data = $request->only('nameUser', 'email', 'password', 'imagen');

        Usuario::create($data);

        return response()->json(['message' => 'Usuario creado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        return $usuario;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nameUser' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:usuarios,email,' . $usuario->id,
            'password' => 'sometimes|required|string|min:8',
            'imagen' => 'nullable|url', // Validar el campo imagen como URL
        ]);

        $data = $request->only('nameUser', 'email', 'imagen');

        if ($request->has('password') && !empty($request->input('password'))) {
            $data['password'] = $request->input('password'); // No hacer hash
        }

        $usuario->update($data);

        return response()->json(['message' => 'Usuario actualizado exitosamente', 'user' => $usuario]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (is_null($usuario)) {
            return response()->json('No se pudo realizar correctamente la operacion', 404);
        }

        $usuario->delete();
        return response()->noContent();
    }
}
