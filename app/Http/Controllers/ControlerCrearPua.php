<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marcas; //Cargamos el modelo de marcas
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //Para utilizar Auth
use Illuminate\Support\Facades\Redirect; //Para refrescar la pagina


class ControlerCrearPua extends Controller
{

    public function crearPua(Request $request)
    {
        //Guardamos los datos del usuario activo
        $usuario = Auth::user();

        $request->validate([
            'lat' => 'required',
            'long' => 'required',
            'estado' => 'required',
            'usuario_id_usuario' => 'required',
            'tipo_marca_id_tipo_marca' => 'required',
        ]);

        // Crear un nuevo pedido con los datos del formulario
        $marca = new Marcas(); // Crea un nuevo marca

        // Asignar valores a las propiedades del marca utilizando los datos recibidos del formulario
        $marca->estado = $request->input('estado'); // Asignar el valor del campo 'estado' del formulario
        $marca->usuario_id_usuario = $usuario->id_usuario; //id del usuario
        $marca->tipo_marca_id_tipo_marca = $request->input('tipo_marca_id_tipo_marca'); // Asignar el valor del campo 'tipo_marca_id_tipo_marca' del formulario
        $marca->lat = $request->input('lat'); // Asignar el valor del campo 'lat' del formulario
        $marca->long = $request->input('long'); // Asignar el valor del campo 'long' del formulario

        // Guardar el marca en la base de datos
        $marca->save(); // Guardar el marca en la base de datos

        // Redirigir a puntos de entrega
        return Redirect::back()->with('status', 'Marca agregada exitosamente');
    }

}