<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Marcas;
use Illuminate\Http\Request;



class CoordenadasController extends Controller
{
    public function index()
    {
        $coordenadas = Marcas::select('long', 'lat')->get(); 
        $info_marca = Marcas::select('usuario_id_usuario', 'estado')->get(); 
        $tipos_marca =  Marcas::select('tipo_marca_id_tipo_marca')->get(); 

        return view('main_pages.lista_proveedores', compact('coordenadas', 'info_marca', 'tipos_marca'));
    }
}
