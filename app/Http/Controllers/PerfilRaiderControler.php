<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerfilRaiderControler extends Controller
{
    public function index(Request $request){
        $raider = Auth::user()->raider;
        $user = Auth::user();

        $results = DB::table('tiendas')
            ->select('tiendas.nombre', 'marcas_has_pedido.cantidad_menus')
            ->join('pedido', 'tiendas.tienda_id_usuario', '=', 'pedido.tiendas_tienda_id_usuario')
            ->join('marcas_has_pedido', 'pedido.id_pedido', '=', 'marcas_has_pedido.pedido_id_pedido')
            ->get();
    
        $sumas_por_tiendas = $results->groupBy('nombre')->map(function ($group) {
            return $group->sum('cantidad_menus');
        })->toArray();

        
        $sumas_por_tiendas = array();

        foreach ($results as $elemento) {
            $nombre = $elemento->nombre;
            $valor = $elemento->cantidad_menus;
            
            if (array_key_exists($nombre, $sumas_por_tiendas)) {
                
                $sumas_por_tiendas[$nombre] += $valor;
            } else {
                
                $sumas_por_tiendas[$nombre] = $valor;
            }
        }


        $response = view('main_pages.perfilRaider', compact('raider', 'user', 'sumas_por_tiendas'));

        return $response;
    }

    public function actualizarContraseña(Request $request){
        
        $password = $request->input('password');
        $passwordRepit = $request->input('passwordConfirm');
        
        if ($password != $passwordRepit) {
            $response = redirect('/');
        }else {
            Auth::user()->password = \bcrypt($password);
            Auth::user()->save();
        }

        
        $raider = Auth::user()->raider;
        $user = Auth::user();

        $response = view('main_pages.perfilRaider', compact('raider', 'user'));

        return $response;
        
    }

    public function actualizarUsuario(Request $request){
        Auth::user()->nombre =$request->input('nombreUsuario');
        Auth::user()->correo =$request->input('correo');
        Auth::user()->telefono =$request->input('telefono');

        Auth::user()->save();
        
        $raider = Auth::user()->raider;
        $user = Auth::user();

        $response = view('main_pages.perfilRaider', compact('raider', 'user'));

        return $response;
    }
}
