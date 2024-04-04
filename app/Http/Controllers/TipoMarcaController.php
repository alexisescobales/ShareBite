<?php

namespace App\Http\Controllers;

use App\Models\Coordenada;
use App\Http\Controllers\Controller;
use App\Models\Tipo_Marca;
use Illuminate\Http\Request;



class CoordenadasController extends Controller
{
    public function index()
    {
        $tiposMarca = Tipo_Marca::all();
        return view('main_pages.main_screen', compact('tipo_marca'));
    }
}
