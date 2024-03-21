<?php

namespace App\Http\Controllers;

use App\Models\Coordenada;
use App\Http\Controllers\Controller;
use App\Models\Marca;
use App\Models\Tipo_Marca;
use Illuminate\Http\Request;



class CoordenadasController extends Controller
{
    public function index()
    {
        $coordenadas = Marca::select('long', 'lat')->get(); 
        $info_marca = Marca::select('tipo_marca_id_tipo_marca', 'usuario_id_usuario', 'estado')->get(); 
        $tipos_marca = Tipo_Marca::all();

        return view('main_pages.main_screen', compact('coordenadas', 'info_marca', 'tipos_marca'));
    }
}
