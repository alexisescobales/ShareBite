<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerfilRaiderControler extends Controller
{
    public function index(Request $request){
        $raider = Auth::user()->raider;
        $user = Auth::user();

        $response = view('main_pages.perfilRaider', compact('raider', 'user'));

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
