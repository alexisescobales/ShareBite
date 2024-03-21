<?php

namespace App\Http\Controllers;

use App\Models\Coordenada;
use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;



class CoordenadasController extends Controller
{
    public function index()
    {
        $coordenadas = Marca::select('long', 'lat')->get(); // Recupera las coordenadas de la base de datos

        $info_marca = Marca::select('tipo_marca_id_tipo_marca', 'usuario_id_usuario', 'estado')->get(); // Recupera las coordenadas de la base de datos
        

        return view('main_pages.main_screen', compact('coordenadas','info_marca'));
    }
}
