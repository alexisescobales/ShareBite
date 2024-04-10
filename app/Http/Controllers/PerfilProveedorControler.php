<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerfilProveedorControler extends Controller
{
    public function index(Request $request){
        $tienda = Auth::user()->tiendas;
        $user = Auth::user();

        $response = view('main_pages.estadisticas', compact('tienda', 'user'));

        return $response;
    }

    public function actualizarMenu(Request $request){
        $tienda = Auth::user()->tiendas;
        $tienda[0]->menus =$request->input('inputMenus');
        $tienda[0]->save();
        $user = Auth::user();
        $response = view('main_pages.estadisticas', compact('tienda', 'user'));

        return $response;
    }

    public function actualizarTienda(Request $request){
        $tienda = Auth::user()->tiendas;
        $tienda[0]->direccion =$request->input('direccion');
        $tienda[0]->nombre =$request->input('nombreTienda');
        $tienda[0]->direccion =$request->input('direccion');

        $tienda[0]->save();
        $user = Auth::user();
        Auth::user()->telefono = $request->input('telefono');
        Auth::user()->save();

        $response = view('main_pages.estadisticas', compact('tienda', 'user'));

        return $response;
    }
}
