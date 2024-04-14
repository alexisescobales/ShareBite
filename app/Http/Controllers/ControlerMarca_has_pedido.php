<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\marcas_has_pedido;
use Illuminate\Http\Request;

class ControlerMarca_has_pedido extends Controller
{
    public function marca_has_pedido(Request $request)
    {
        // Obtener los datos del pedido y los lotes asignados del cuerpo de la solicitud
        $pedido = $request->input('pedido');
        $lotesAsignados = $request->input('lotesAsignados');
    
        // Iterar sobre los lotes asignados y crear un nuevo registro en la tabla para cada punto de entrega

            // Obtener el ID del punto de entrega
      
    
            // Crear un nuevo registro en la tabla marcas_has_pedido
            $marcaPedido = new marcas_has_pedido();
            $marcaPedido->marcas_id_marcas = 18;
            $marcaPedido->pedido_id_pedido = 1; // Utilizar el ID del pedido desde el objeto pedido
            $marcaPedido->cantidad_menus = 5; // Obtener la cantidad de lotes desde el detalle
            $marcaPedido->save();
        
    
        // Respuesta de éxito
        return response()->json(['message' => 'Datos guardados exitosamente'], 200);
    }
    
}
