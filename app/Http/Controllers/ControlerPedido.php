<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pedido; //Cargamos el modelo de pedido
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //Para acceder a la BD
use Illuminate\Support\Facades\Auth; //Para utilizar Auth


class ControlerPedido extends Controller
{

    public function crearPedido(Request $request)
    {

        //Guardamos el utlitimo id del campo id_pedido
        $ultimoId = DB::table('pedido')->max('id_pedido');

        //Guardamos los datos del usuario activo
        $usuario = Auth::user();





        // Crear un nuevo pedido con los datos del formulario
        $pedido = new Pedido(); //Crea un nuevo pedido
        $pedido->id_pedido = $ultimoId + 1; //Hacemos autoincremenetal la primary key
        $pedido->raider_id_raider_id_usuario = $usuario->id_usuario; //id del usuario
        $pedido->tiendas_tienda_id_usuario = $request->tienda_id; //id de la tienda
        $pedido->cantidad_menus = $request->cantidad_menus; //Cantidad de menus reservados
        $pedido->estado = 'creado'; // Estado inicial aquí
        $pedido->time_reco = now(); // Establecer la fecha y hora actual 
        $pedido->save(); //Guardamos el pedido

        // Restar los lotes reservados del campo 'menus' en la tabla 'tiendas'
        DB::table('tiendas')
            ->where('tienda_id_usuario', $request->tienda_id)
            ->decrement('menus', $request->cantidad_menus);

        // Redirigir a puntos de entrega
        return redirect()->route('lista_puntos_entrega');
    }

}
