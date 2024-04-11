<?php

namespace App\Http\Controllers;


use App\Models\usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('log_in_pages.log_in');
    }

    public function login(Request $request)
    {
        $correo = $request->input('correo');
        $password = $request->input('password');

        $user = usuario::where('correo', $correo)->first();

        if ($user) {
            if ($password === $user->contrasenya) {
                Auth::login($user);
                return redirect('/pagina principal');
            }
        }

        return redirect('/')->with('error', 'Usuari i/o contrasenya incorrectes');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
