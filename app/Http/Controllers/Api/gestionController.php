<?php

namespace App\Http\Controllers\Api;

use App\Models\usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\adminsResource;
use Illuminate\Database\QueryException;

class gestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::with('tipo_usuario')->paginate(30);

        return AdminsResource::collection($usuarios);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = new usuario();

        $usuario->nombre = $request->input('nombre');
        $usuario->correo = $request->input('correo');
        $usuario->password = $request->input('password');
        $usuario->telefono = $request->input('telefono');
        $usuario->foto = $request->input('foto');
        $usuario->activo = $request->input('activo');
        $usuario->tipo_usuario_id_tipo = $request->input('tipo_usuario');

        try {
            $usuario->save();
            $response = (new adminsResource($usuario))->response()->setStatusCode(201);
        } catch (QueryException $e) {
            $response = response()->json([
                'error' => $e,
            ], 400);
        }  

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = usuario::with('tipo_usuario')->findOrFail($id);

        return new adminsResource($usuario);
    }

    public function editarform($id)
    {
        $usuario = usuario::with('tipo_usuario')->findOrFail($id);

        return view('/administracion/editar', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = usuario::findOrFail($id);

        $usuario->nombre = $request->input('nombre');
        $usuario->correo = $request->input('correo');
        $usuario->telefono = $request->input('telefono');
        $usuario->foto = $request->input('foto');
        $usuario->activo = $request->has('activo');
        $usuario->tipo_usuario_id_tipo = $request->input('tipo_usuario_id_tipo');
        $usuario->save();

        $response = (new adminsResource($usuario))->response()->setStatusCode(201);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = usuario::findOrFail($id);
        
        $usuario->activo = 0;
        $usuario->save();

        $response = response()->json(['mensaje' => "Registro desactivado correctamente"], 200);

        return $response;
    }
}
