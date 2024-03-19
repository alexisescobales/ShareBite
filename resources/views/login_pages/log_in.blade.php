@extends('layout_login_screen')

@section('leftColumn')
    <form class="login_div" action="{{ action([App\Http\Controllers\ControlerUsuario::class, 'login']) }}" method="POST">
        @csrf
        <div class="inputs">
            <div class="input-wrapper mb-3">
                <p class="subtitle">Correo</p>
                <div class="input-label">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="correo" id="correo" class="form-control">
                </div>
            </div>
            <div class="input-wrapper mb-3">
                <p class="subtitle">Contraseña</p>
                <div class="input-label">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
        </div>
        <div class="my-3 button-login-group">
            <a href="{{ route('principal') }}">
                <button type="button" class="btn_secondary btn_mediano" id="login_btn">VOLVER</button>
            </a>
            <button type="submit" class="btn_principal_yellow btn_mediano" id="register_btn">LOGIN</button>
        </div>
    </form>
@endsection
