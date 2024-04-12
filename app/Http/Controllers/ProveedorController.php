<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\tiendas;

class ProveedorController extends Controller
{
    public function cargarProveedor($id)
    {
        //recoger datos de bd y pasarlos al view como parametro
        $proveedor = tiendas::find($id);
        return view('main_pages.proveedor_screen', compact('proveedor'));
    }
}
