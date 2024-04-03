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
            'tipo_usuario_id_tipo' => $request->tipo_usuario,
        ]);

        return redirect()->route('mostrar.usuarios')->with('success', 'Usuario creado correctamente.');

        return redirect()->route('mostrar.usuarios')->withErrors(['error' => 'Datos incorrectos, revisar datos introducidos']);
    }

    public function delete($id) 
    {
        $usuario = usuario::findOrFail($id);

        // $usuario->delete(); Cambiar per actiu/inactiu
        return redirect()->route('mostrar.usuarios');
    }
}