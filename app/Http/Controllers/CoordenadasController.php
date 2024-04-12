<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marcas;
use App\Models\Tiendas;
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
        // Obtener todas las tiendas que tengan mas de 0 menus
        $tiendas = Usuario::where('tipo_usuario_id_tipo', 2)
            ->whereHas('tiendas', function($query) {
                $query->where('menus', '>', 0);
            })
            ->with('tiendas.marca')
            ->get();
    
        // Obtener solo los nombres de las tiendas que tienen más de 0 menús
        $nombre_tiendas = Tiendas::where('menus', '>', 0)
            ->select('nombre')
            ->get();
    
        return view('main_pages.lista_proveedores', compact('tiendas', 'nombre_tiendas'));
    }

}
