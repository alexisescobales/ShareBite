<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControlerUsuario extends Controller
{



    public function showLoginForm()
    {

        // $usuario = new Usuario();
        // $usuario->nombre = 'Rachid';
        // $usuario->correo = 'rachid@gmail.com';
        // $usuario->password = \bcrypt('123');
        // $usuario->foto = 'foto.png';
        // $usuario->tipo_usuario_id_tipo = 3;
        // $usuario->save();
        return view('login_pages.log_in');
    }

    public function login(Request $request){
        $correo = $request->input('correo');
        $password = $request->input('password');
        $user = Usuario::where('correo', $correo)->first();

        if($user !=null && Hash::check($password, $user->password)){
            Auth::login($user);
            $response = redirect('/');
        }else{
            $request->session()->flash('error', 'Usuario o contraseña incorrectos');
            $response = redirect('/log_in')->withInput();
        }
        return $response;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
