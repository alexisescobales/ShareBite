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

        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'password' => 'required',
            'foto' => 'required',
            'tipo_usuario_id_tipo' => 'required'
        ]);

        $usuari = new usuario;
        $usuari->nombre = $request->nombre;
        $usuari->correo = $request->correo;
        $usuari->password = $request->password;
        $usuari->foto = $request->foto;
        $usuari->tipo_usuario_id_tipo = $request->tipo_usuario_id_tipo;
        $usuari->save();

        return redirect()->route('administracion.admins')->with('success', 'Usuario creado correctamente.');

        return redirect()->route('administracion.admins')->withErrors(['error' => 'Datos incorrectos, revisar datos introducidos']);
    }
}