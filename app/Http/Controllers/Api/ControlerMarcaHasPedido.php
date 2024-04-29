<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\MarcasHasPedido;
use App\Models\Pedido; // Importar el modelo Pedido
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect; //Para refrescar la pagina

class ControlerMarcaHasPedido extends Controller
{
    public function marca_has_pedido(Request $request)
    {
        // Obtener los datos del pedido y los lotes asignados del cuerpo de la solicitud
        $pedido = $request->input('pedido');
        $lotesAsignados = $request->input('lotesAsignados');

        // Iterar sobre los lotes asignados y crear un nuevo registro en la tabla para cada punto de entrega
        foreach ($lotesAsignados as $lote) {
            // Crear un nuevo registro en la tabla MarcasHasPedido para cada lote asignado
            $marcaPedido = new MarcasHasPedido();
            $marcaPedido->marcas_id_marcas = $lote['id'];
            $marcaPedido->pedido_id_pedido = $pedido['id'];
            $marcaPedido->cantidad_menus = $lote['lotes'];
            $marcaPedido->save();
        }

        // Restar la cantidad de menús asignados en las marcas al pedido
        $pedidoModel = Pedido::find($pedido['id']);
        if ($pedidoModel) {
            foreach ($lotesAsignados as $lote) {
                $pedidoModel->cantidad_menus -= $lote['lotes'];
            }
            $pedidoModel->save();

            // Verificar si la cantidad de menús ahora es 0 y actualizar el estado del pedido
            if ($pedidoModel->cantidad_menus == 0) {
                $pedidoModel->estado = 'completado';
                $pedidoModel->save();
            }
        }
        return Redirect::back()->with('status', 'Marca agregada exitosamente');
    }
}
