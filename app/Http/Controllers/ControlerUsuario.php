<?php

namespace App\Http\Controllers;

use App\Models\Marcas;
use App\Models\Tiendas;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request){
        $correo = $request->input('correo');
        $password = $request->input('password');
        $user = Usuario::where('correo', $correo)->first();

        if($user !=null && Hash::check($password, $user->password)){
            Auth::login($user);
            if ($user->tipo_usuario_id_tipo == 3) {
                $response = redirect('/mainRaider');
            }elseif ($user->tipo_usuario_id_tipo == 2) {
                $response = redirect('/log_in');
            }elseif ($user->tipo_usuario_id_tipo == 1) {
                $response = redirect('/mainAdmin');
            }
            
        }else{
            $request->session()->flash('error', 'Usuario o contraseña incorrectos');
            $response = redirect('/log_in')->withInput();
        }
        return $response;
    }

    public function registro1(Request $request){
        $name = $request->input('name') . $request->input('apellido');
        $password = $request->input('password');
        $correo = $request->input('correo');
        $foto = "";
        // $usuario = new Usuario();
        // $usuario->nombre = 'Rachid';
        // $usuario->correo = 'rachid@gmail.com';
        // $usuario->password = \bcrypt('123');
        // $usuario->foto = 'foto.png';
        // $usuario->tipo_usuario_id_tipo = 3;
        // $usuario->save();
            
        $response = redirect('/log_in');
        
        return $response;
    }

    public function registro2(Request $request){
        $name = $request->input('name') . $request->input('apellido');
        $password = $request->input('password');
        $passwordRepit = $request->input('repitPassword');
        $correo = $request->input('correo');
        $foto = "";
        $repetido = false;
        if ($password != $passwordRepit) {
            $response = redirect('/');
        }else {
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
                "tipo_usuario_id_tipo" => 2);
                $response = view('login_pages.register_shop', compact('registro1'));

            }
        }
        return $response;
    }

    public function seleccion($eleccion){
        return view('login_pages.register', compact('eleccion'));
    }
}
