<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Raider;
use App\Models\Tiendas;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB; //Para acceder a la BD

class ControlerUsuario extends Controller
{



    public function showLoginForm()
    {

        // $usuario = new Usuario();
        // $usuario->nombre = 'consum';
        // $usuario->correo = 'consum@gmail.com';
        // $usuario->password = \bcrypt('123');
        // $usuario->foto = 'foto.png';
        // $usuario->tipo_usuario_id_tipo = 2;
        // $usuario->save();

        // $usuario = new Tiendas();
        // $usuario->tienda_id_usuario = 2;
        // $usuario->estado = true;
        // $usuario->menus = 2;
        // $usuario->direccion = 'carrer villarroel 126';
        // $usuario->save();

        // $usuario = new Marcas();
        // $usuario->estado = true;
        // $usuario->usuario_id_usuario = 1;
        // $usuario->tipo_marca_id_tipo_marca = 1;
        // $usuario->lat = 41.391615;
        // $usuario->long = 2.159614;
        // $usuario->save();


        return view('login_pages.log_in');
    }

    public function login(Request $request)
    {
        $correo = $request->input('correo');
        $password = $request->input('password');
        $user = Usuario::where('correo', $correo)->first();

        if ($user != null && Hash::check($password, $user->password)) {
            Auth::login($user);
            if ($user->tipo_usuario_id_tipo == 3) {
                $response = redirect('/mainRaider');
            }elseif ($user->tipo_usuario_id_tipo == 2) {
                //$response = redirect('/estadisticas');
                $response = redirect('/mainProveedor');
            }elseif ($user->tipo_usuario_id_tipo == 1) {
                $response = redirect('/adminsvue');
            }

        } else {
            $request->session()->flash('error', 'Usuario o contraseña incorrectos');
            $response = redirect('/log_in')->withInput();
        }
        return $response;
    }

    public function registro1(Request $request)
    {
        $name = $request->input('name') . $request->input('apellido');
        $password = $request->input('password');
        $passwordRepit = $request->input('repitPassword');
        $correo = $request->input('correo');
        $repetido = false;

        if ($password != $passwordRepit) {
            $response = redirect('/');
        } else {
            $usuarios = Usuario::all();
            foreach ($usuarios as $usuario) {
                if ($usuario->correo == $correo) {
                    $repetido = true;
                    $response = redirect('/');
                }
            }
            if ($repetido == false) {

                $usuario = new Usuario();
                $usuario->nombre = $name;
                $usuario->correo = $correo;
                $usuario->password = \bcrypt($password);
                $usuario->foto = 'foto.png';
                $usuario->tipo_usuario_id_tipo = 3;
                $usuario->save();
                $usuarioo = Usuario::orderBy('id_usuario', 'desc')->first();

                $raider = new Raider();
                $raider->id_raider_id_Usuario = $usuarioo->id_usuario;
                $raider->estado = 1;
                $raider->save();

                Auth::login($usuarioo);
            }
        }     
        $response = redirect('/mainRaider');
        return $response;
    }

    public function registro2(Request $request)
    {
        $name = $request->input('name') . $request->input('apellido');
        $password = $request->input('password');
        $passwordRepit = $request->input('repitPassword');
        $correo = $request->input('correo');
        $foto = "";
        $repetido = false;
        if ($password != $passwordRepit) {
            $response = redirect('/');
        } else {
            $usuarios = Usuario::all();
            foreach ($usuarios as $usuario) {
                if ($usuario->correo == $correo) {
                    $repetido = true;
                    $response = redirect('/');
                }
            }
            if ($repetido == false) {
                $registro1 = array(
                    "name" => $name,
                    "apellido" => $request->input('apellido'),
                    "correo" => $correo,
                    "password" => $password,
                    "telefono" => $request->input('telefono'),
                    "tipo_usuario_id_tipo" => 2
                );
                $response = view('login_pages.register_shop', compact('registro1'));

            }
        }
        return $response;
    }

    public function registro3(Request $request)
    {

        $nombreTienda = $request->input('nombreTienda');
        $categoria = $request->input('categoria');
        $direccion = $request->input('direccion');
        $horario = $request->input('horario');

        // Realizar una solicitud a la API de geocodificación de Mapbox para obtener las coordenadas
        $response = Http::get('https://api.mapbox.com/geocoding/v5/mapbox.places/' . urlencode($direccion) . '.json', [
            'access_token' => 'pk.eyJ1IjoiYWxleGlzcG9saXRlY25pY3MiLCJhIjoiY2x0b2hwNmIzMGdoZzJqbzY4NmlpdzVlYiJ9.CZoNf9VOaZAV8iojEmzQtw'
        ]);

        $latitud = $response['features'][0]['geometry']['coordinates'][1];
        $longitud = $response['features'][0]['geometry']['coordinates'][0];

        $name = $request->input('name') . $request->input('apellido');
        $password = $request->input('password');
        $correo = $request->input('correo');

        $usuario = new Usuario();
        $usuario->nombre = $name;
        $usuario->correo = $correo;
        $usuario->password = \bcrypt($password);
        $usuario->foto = 'foto.png';
        $usuario->tipo_usuario_id_tipo = 2;
        $usuario->save();
        $usuarioo = Usuario::orderBy('id_usuario', 'desc')->first();

        // Crear una nueva marca asociada a las coordenadas proporcionadas
        $marca = new Marcas();
        $marca->estado = 1;
        $marca->usuario_id_usuario = $usuario->id_usuario;
        $marca->tipo_marca_id_tipo_marca = 1;
        $marca->lat = $latitud;
        $marca->long = $longitud;
        $marca->save();

        $ultimoId = DB::table('marcas')->max('id_marcas');

        $tienda = new Tiendas();
        $tienda->tienda_id_usuario = $usuarioo->id_usuario;
        $tienda->estado = 1;
        $tienda->menus = 10;
        $tienda->direccion = $direccion;
        $tienda->categoria = $categoria;
        $tienda->horario = $horario;
        $tienda->nombre = $nombreTienda;
        $tienda->id_marca = $ultimoId;
        $tienda->save();
        Auth::login($usuarioo);

        $response = redirect('estadisticas');
        return $response;
    }

    public function seleccion($eleccion)
    {
        return view('login_pages.register', compact('eleccion'));
    }

    public function CerrarSesion(){
        Auth::logout();
        return redirect('/');
    }
}
