<?php

namespace App\Http\Controllers;

use App\Models\pedido;
use App\Models\Tiendas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerfilProveedorControler extends Controller
{
    public function index(Request $request){
        $tienda = Auth::user()->tiendas;
        $user = Auth::user();

        $pedidosEntregados = pedido::where("estado", "=", "entregado")->get();
        $tiendasNombres = Tiendas::distinct()->pluck('nombre')->toArray();
        $allTiendas = Tiendas::all();
        $tiendas = [];

        foreach ($tiendasNombres as $nombreTienda) {
            $valor = 0; // Un array para almacenar los valores de esta tienda
            
            foreach ($allTiendas as $tiendaaa) {
                if ($tiendaaa->nombre == $nombreTienda) {
                    $valor = $valor + 1; // Agregar el valor de la tienda a la lista de valores
                }
            }
            
            // Asignar los valores a la clave de la tienda
            $tiendas[$nombreTienda] = $valor;
        }
        
        //$tiendas es el resultado final;

        foreach ($tiendas as $clave => $valor) {
            echo "Clave: $clave, Valor: $valor <br>";
        }



        function convertirNumeroADia()
{
    $pedidosSemana = [
        'Domingo' => 0,
        'Lunes' => 0,
        'Martes' => 0,
        'Miércoles' => 0,
        'Jueves' => 0,
        'Viernes' => 0,
        'Sábado' => 0
    ];

    $pedidosUltimosSieteDias = Pedido::where('time_reco', '>=', now()->subDays(7))
                            ->where('estado', 'entregado')
                            ->get();

    // Itera sobre los resultados y cuenta los pedidos para cada día de la semana
    foreach ($pedidosUltimosSieteDias as $pedido) {
        $dayOfWeek = Pedido::where('id_pedido', $pedido->id_pedido)
                    ->value(DB::raw('DAYOFWEEK(time_reco)')); // Obtiene el día de la semana directamente en la consulta
        echo "dayOfWeek = " .  $dayOfWeek; 
        switch ($dayOfWeek) {
            case 1:
                $pedidosSemana['Domingo']++;
                break;
            case 2:
                $pedidosSemana['Lunes']++;
                break;
            case 3:
                $pedidosSemana['Martes']++;
                break;
            case 4:
                $pedidosSemana['Miércoles']++;
                break;
            case 5:
                $pedidosSemana['Jueves']++;
                break;
            case 6:
                $pedidosSemana['Viernes']++;
                break;
            case 7:
                $pedidosSemana['Sábado']++;
                break;
            default:
                // Manejar el caso desconocido, si es necesario
                break;
        }
    }
    
    return $pedidosSemana;
}

        $array = convertirNumeroADia();
        foreach ($array as $clave => $valores) {
            echo "Clave: $clave\n";
            echo "Valor: $valor\n";
            echo "\n";
        }


        
        
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
        $tienda[0]->save();
        Auth::user()->telefono = $request->input('telefono');
        Auth::user()->nombre =$request->input('nombreUsuario');
        Auth::user()->correo =$request->input('correo');
        Auth::user()->save();
        $user = Auth::user();

        $response = view('main_pages.estadisticas', compact('tienda', 'user'));

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

        
        $tienda = Auth::user()->tiendas;
        $user = Auth::user();

        $response = view('main_pages.estadisticas', compact('tienda', 'user'));


        return $response;
        
    }
}
