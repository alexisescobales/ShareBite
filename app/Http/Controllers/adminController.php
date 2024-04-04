<?php

namespace App\Http\Controllers;


use App\Models\usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class adminController extends Controller
{
    public function index()
    {
        return view('administracion.admins');
    }

    public function mostrar()
    {
        $usuarios = usuario::with('tipo_usuario')->paginate(10)->withQueryString();

        return view('administracion.crud', compact('usuarios'));
    }

    public function store(Request $request)
    {

        usuario::create([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'password' => bcrypt($request->contrasenya),
            'telefono' => $request->telefono,
            'foto' => $request->foto,
            'activo' => $request->has('activo'),
            'tipo_usuario_id_tipo' => $request->tipo_usuario
        ]);

        return redirect()->route('mostrar.usuarios')->with('success', 'Usuario creado correctamente.');

        return redirect()->route('mostrar.usuarios')->withErrors(['error' => 'Datos incorrectos, revisar datos introducidos']);
    }

    public function editarUser($id)
    {
        $usuario = usuario::with('tipo_usuario')->findOrFail($id);

        return view('/administracion/editar', compact('usuario'));
    }

    public function editar(Request $request, $id)
    {
        $usuario = usuario::findOrFail($id);
        
        $usuario->nombre = $request->input('nombre');
        $usuario->correo = $request->input('correo');
        $usuario->telefono = $request->input('telefono');
        $usuario->foto = $request->input('foto');
        $usuario->actiu = $request->has('actiu');
        $usuario->tipo_usuario_id_tipo = $request->input('tipo_usuario_id_tipo');
        $usuario->save();

        return redirect()->route('mostrar.usuarios')->with('success', 'Usuario creado correctamente.');

        return redirect()->route('mostrar.usuarios')->withErrors(['error' => 'Datos incorrectos, revisar datos introducidos']);
    }

    public function eliminar($id) 
    {
        $usuario = usuario::findOrFail($id);

        $usuario->actiu = 0;
        return redirect()->route('mostrar.usuarios');
    }
}