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
}
