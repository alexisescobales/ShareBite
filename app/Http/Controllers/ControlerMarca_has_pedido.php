<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\marcas_has_pedido;
use App\Models\pedido;
use App\Models\Marcas;
use Illuminate\Http\Request;

class ControlerMarca_has_pedido extends Controller
{
    public function marca_has_pedido(Request $request)
    {
        // Obtener los datos del pedido y los lotes asignados del cuerpo de la solicitud
        $pedido = $request->input('pedido');
        $lotesAsignados = $request->input('lotesAsignados');
    
        // Iterar sobre los lotes asignados y crear un nuevo registro en la tabla para cada punto de entrega
        foreach ($lotesAsignados as $lote) {
            // Crear un nuevo registro en la tabla marcas_has_pedido para cada lote asignado
            $pedidoo = pedido::where(['id_pedido' => $pedido->id]);

            $pedidoo->marcas=Marcas::where(['id_pedido' => $lote['id']]);

            $pedidoo->save();
        }
    
        // Respuesta de éxito
        return response()->json(['message' => 'Datos guardados exitosamente'], 200);
    }
}
