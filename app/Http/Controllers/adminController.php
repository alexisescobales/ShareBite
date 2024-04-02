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
        $usuaris = usuario::paginate(10);

        return view('administracion.crud', ['usuario' => $usuaris]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'nom' => 'required',
            'cognoms' => 'required',
            'username' => 'required|unique:usuaris,username',
            'contrasenya' => 'required'
        ], [
            'required' => 'El camp :attribute es obligatori.',
            'unique' => 'El :attribute ja existeix'
        ]);

        $usuari = new usuario;
        $usuari->nom = $request->nom;
        $usuari->cognoms = $request->cognoms;
        $usuari->username = $request->username;
        $usuari->contrasenya = $request->contrasenya;
        $usuari->tipus_usuaris_id = $request->tipus_usuaris_id;
        $usuari->save();

        return redirect()->route('gestioUsuaris')->with('success', 'Usuari creat correctament!');

        return redirect()->route('gestioUsuaris')->withErrors(['error' => 'Datos incorrectos, revisar datos introducidos']);
    }
}