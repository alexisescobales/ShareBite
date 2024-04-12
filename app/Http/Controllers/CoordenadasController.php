<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marcas;
use App\Models\Usuario;
use Illuminate\Http\Request;


class CoordenadasController extends Controller
{

    public function entrega() //Esta funcion filtra solo por tipo_marca 0 = CLIENTE
    {
        // Obtener solo las coordenadas con tipo de marca igual a 1
        $coordenadas = Marcas::select('tipo_marca_id_tipo_marca', 'long', 'lat')
            ->where('tipo_marca_id_tipo_marca', 0)
            ->get();

        // Obtener otra información de marca si es necesario
        $info_marca = Marcas::select('usuario_id_usuario', 'estado')->get();

        return view('main_pages.lista_puntos_entrega', compact('coordenadas', 'info_marca'));
    }

    public function recogida()
    {    
        // Obtener usuarios que son tiendas (tipo_usuario_id_tipo igual a 2)
        // Obtener todos los usuarios cuyo tipo de usuario es 2 (tiendas)
        $tiendas = Usuario::where('tipo_usuario_id_tipo', 2)
            ->with('tiendas.marca') // Cargar la relación tiendas junto con las marcas de cada tienda
            ->get();
    
        return view('main_pages.lista_proveedores', compact('tiendas'));
    }
    
}
